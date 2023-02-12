<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria';
    protected $fillable = ['nama_kriteria', 'bobot','status', 'crips_id','tipe_data'];
    // protected $hidden = ['created_at', 'hidden_at'];

    // public function nilai() {
    //     return $this->hasMany(\App\Nilai::class);
    // }

    public function crips() {
        return $this->belongsTo(Crips::class,'crips_id','id');
    }

    // public function crips()
    // {
    //     return $this->belongsTo(Crips::class, 'crips_id','id');
    // }
}
