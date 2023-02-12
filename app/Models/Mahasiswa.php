<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mahasiswa extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        'nama_mahasiswa',
        'nim_mahasiswa',
        'jk',
        'tmp_lahir',
        'tgl_lahir',
        'jurusan_id',
        'prodi_id'

    ];

    public function jurusans()
    {
        return $this->belongsTo(Jurusan::class,'jurusan_id','id');
    }

    public function prodis()
    {
        return $this->belongsTo(Prodi::class,'prodi_id','id');
    }

    public function atribut()
    {
        return $this->hasMany(Atribut::class, 'mahasiswa_id');
    }

    public static function getData(){
        $data = Mahasiswa::select('nim_mahasiswa','id')->get();
        for($i = 0; $i<count($data); $i++){
            $temp_level1 = Atribut::select('id','kriteria_id','mahasiswa_id','value')->where('mahasiswa_id',$data[$i]->id)->get(); 
            for($j = 0 ; $j<count($temp_level1);$j++){
                $r = 'p'.($j+1);
                $data[$i]->$r = $temp_level1[$j]->value;
            }
            unset($data[$i]->id);
        }
        return $data;
    }

    public static function getData2(){
        $data = Mahasiswa::select('nim_mahasiswa','id')->get();
        if(Auth::user()!= null &&  Auth::user()->role=="Mahasiswa"){
            $data = Mahasiswa::select('nim_mahasiswa','id')
            ->where('mahasiswa.nim_mahasiswa',Auth::user()->nim_mahasiswa)->get();
        }
        for($i = 0; $i<count($data); $i++){
            $temp_level1 = Atribut::select('id','kriteria_id','mahasiswa_id','value')->where('mahasiswa_id',$data[$i]->id)->get(); 
            for($j = 0 ; $j<count($temp_level1);$j++){
                $r = 'p'.($j+1);
                $data[$i]->$r = $temp_level1[$j]->value;
            }
            unset($data[$i]->id);
        }
        return $data;
    }

    public function ranking($id)
    {
        $nilai = Atribut::where('mahasiswa_id', $id)->first();
        return $nilai;
    }


    protected $table = 'mahasiswa';
}
