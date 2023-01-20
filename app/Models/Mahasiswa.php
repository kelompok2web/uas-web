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

    protected $table = 'mahasiswa';
}
