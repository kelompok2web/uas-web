<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prodi extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = ['nama_prodi','jurusan_id'];

    public function jurusans()
    {
        return $this->belongsTo(Jurusan::class,'jurusan_id','id');
    }

    protected $table = 'prodi';
}
