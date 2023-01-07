<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Prodi;
use App\Models\Mahasiswa;

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
        $prodi = Prodi::count();
        $mhs = Mahasiswa::count();
        $mhslk = Mahasiswa::where('jk', 'L')->count();
        $mhspr = Mahasiswa::where('jk', 'P')->count();
        return view('admin.home',compact('jurusan','prodi','mhs','mhslk','mhspr'));
    }
}
