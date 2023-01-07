<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $fillable = ['nama_prodi','jurusan_id'];

    public function jurusans()
    {
        return $this->belongsTo(Jurusan::class,'jurusan_id','id');
    }

    protected $table = 'prodi';
}
