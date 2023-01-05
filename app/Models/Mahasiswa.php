<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $fillable=[
        'nama_mahasiswa',
        'jrsn_mahasiswa',
        'prodi_mahasiswa'

    ];

    public function penilaian()
    {
        return $this->belongsTo('App\Models\Ke','kelas_id');
    }
}
