<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Prodi;
use App\Models\Kriteria;
use App\Models\Mahasiswa;
use App\Models\Crips;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jurusan = Jurusan::count();
        $kriteria = Kriteria::count();
        $crips = Crips::count();
        $prodi = Prodi::count();
        $mhs = Mahasiswa::count();
        $mhslk = Mahasiswa::where('jk', 'L')->count();
        $mhspr = Mahasiswa::where('jk', 'P')->count();
        return view('admin.home',compact('jurusan','prodi','mhs','mhslk','mhspr','kriteria','crips'));
    }
}
