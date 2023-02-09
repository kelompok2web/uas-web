<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Crips;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = Kriteria::all();
        $crips = Crips::orderBy('nama_crips')->get();
        return view('admin.kriteria.index', compact('kriteria','crips'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // return view('kriteria.tambah');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kriteria' => 'required',
            'bobot' => 'required',
            'tipe_data' => 'required',

        ]);
        Kriteria::create([
            'nama_kriteria' => $request->nama_kriteria,
            'bobot' => $request->bobot,
            'tipe_data' => $request->tipe_data,
            'crips_id' => $request->crips_id
        ]);

        return redirect('/kriteria')->with('success', 'Berhasil menambahkan data kriteria baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kriteria::find($id);
        $crips = Crips::orderBy('nama_crips')->get();
        $send=[
            "data"=>$data,
            "crips"=>$crips,
    
        ];
        return view('admin.kriteria.edit',$send);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=Kriteria::find($id);
        $data->nama_kriteria=$request->nama_kriteria;
        $data->crips_id=$request->crips_id;
        $data->bobot=$request->bobot;
        $data->tipe_data=$request->tipe_data;
        $data->save();

        //update user disini

        return redirect('/kriteria')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kriteria  $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Kriteria::find($id);
        $item->delete();
        return redirect('/kriteria')->with('success', 'Berhasil menghapus data kriteria!');

    }
}
