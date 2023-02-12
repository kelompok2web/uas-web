<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SAW\SAW;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use App\Models\Atribut;
use App\Models\Kriteria;
use Barryvdh\DomPDF\Facade\Pdf;
use DB;
use Auth;


class SAWController extends Controller
{
    public function indexC(){
       $saw = new SAW;
       return $saw->index();
    }

    public function getDataC(){
        $saw = new SAW;
        return $saw->getData();
    }
    
    public function sampleC()
    {
        $saw = new SAW;
        return $saw->sample();
    }

    public function sample2C()
    {
        $saw = new SAW;
        return $saw->sample2();
    }

    public function sample3C()
    {
        $saw = new SAW;
        return $saw->sample3();
    }
    
    public function sample3PDFC()
    {
        $saw = new SAW;
        return $saw->sample3PDF();
    }

    public function mahasiswaC(){
        $saw = new SAW;
        return $saw->mahasiswa();
    }

    function test(){
        $DATA = DB::table('kriteria')->pluck('bobot')->toArray();
        return $DATA;
        
    }
}
