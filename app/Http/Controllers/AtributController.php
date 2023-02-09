<?php

namespace App\Http\Controllers;

use App\Models\Atribut;
use App\Models\Kriteria;
use App\Models\Mahasiswa;
use App\Models\CripsDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtributController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public $search;
    public function index()
    {
        $atribut = Atribut::all();
        $kriteria = Kriteria::orderBy('nama_kriteria')->get();
        $mhs = Mahasiswa::orderBy('nama_mahasiswa')->get();
        $penghasilan = CripsDetail::where('crips_id','1')
            ->orderBy('kelompok','asc')
            ->get();
        $prestasi = CripsDetail::where('crips_id','2')
            ->orderBy('kelompok','asc')
            ->get();
        $rumah = CripsDetail::where('crips_id','3')
            ->orderBy('kelompok','asc')
            ->get();
        $dataNew = Mahasiswa::getData();
        return view('admin.atribut.index', compact(
            'atribut','mhs','kriteria','penghasilan','prestasi','rumah','dataNew'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public $mahasiswa_id,
     $mahasiswa,
     $nim,
     $ipk, 
     $penghasilan, 
     $jumlah_tanggungan, 
     $prestasi, 
     $lokasi_rumah,
     $kriterias;
     
    public function store(Request $request)
    {   
        // return $request->all();
        $data = new Atribut();
        $data->mahasiswa_id = $request->mahasiswa_id;
        $data->value = $request->ipk;
        $data->kriteria_id = 1;
        $data->save();

        $data = new Atribut();
        $data->mahasiswa_id = $request->mahasiswa_id;
        $data->value = $request->penghasilan;
        $data->kriteria_id = 2;
        $data->save();


        $data = new Atribut();
        $data->mahasiswa_id = $request->mahasiswa_id;
        $data->value = $request->tanggungan;
        $data->kriteria_id = 3;
        $data->save();

        $data = new Atribut();
        $data->mahasiswa_id = $request->mahasiswa_id;
        $data->value = $request->prestasi;
        $data->kriteria_id = 4;
        $data->save();

        $data = new Atribut();
        $data->mahasiswa_id = $request->mahasiswa_id;
        $data->value = $request->rumah;
        $data->kriteria_id = 5;
        $data->save();
        
















        // DB::beginTransaction();
        // $mahasiswa_id = $this->mahasiswa_id;



        // $ipk = Atribut::create(
        //     [
        //         'mahasiswa_id'=>$request->mahasiswa_id,
        //         'kriteria_id' => 1
        //     ], 
        //     [
        //         'value' => number_format($request->ipk, 2)
        //     ]
        // );

        // $penghasilan = Atribut::create(
        //     [
        //         'mahasiswa_id'=>$request->mahasiswa_id,
        //         'kriteria_id' => 2
        //     ], 
        //     [
        //         'value' => (int) $request->penghasilan
        //     ]
        // );

        // $jumlah_tanggungan = Atribut::create(
        //     [
        //         'mahasiswa_id'=>$request->mahasiswa_id,
        //         'kriteria_id' => 3
        //     ], 
        //     [
        //         'value' => (int) $request->tanggungan
        //     ]
        // );

        // $prestasi = Atribut::create(
        //     [
        //         'mahasiswa_id'=>$request->mahasiswa_id,
        //         'kriteria_id' => 4
        //     ], 
        //     [
        //         'value' => (int) $request->prestasi
        //     ]
        // );

        // $kondisi_rumah = Atribut::create(
        //     [
        //         'mahasiswa_id'=>$request->mahasiswa_id,
        //         'kriteria_id' => 5
        //     ], 
        //     [
        //         'value' => (int) $request->rumah
        //     ]
        // );

        // DB::commit();
        
        return redirect('/atribut')->with('success', 'Berhasil menambahkan data atribut baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atribut  $atribut
     * @return \Illuminate\Http\Response
     */
    public function show(Atribut $atribut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atribut  $atribut
     * @return \Illuminate\Http\Response
     */
    public function edit(Atribut $atribut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Atribut  $atribut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Atribut $atribut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atribut  $atribut
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atribut $atribut)
    {
        //
    }
}
