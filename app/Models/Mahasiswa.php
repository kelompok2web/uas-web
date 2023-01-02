<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama_mahasiswa',
        'jurusan_id',
        'prodi_id',
        'jk',
        'telp',
        'tmp_lahir',
        'tgl_lahir',
        'foto'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
