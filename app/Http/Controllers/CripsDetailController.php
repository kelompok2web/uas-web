<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CripsDetail;
use App\Models\Crips;

class CripsDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cd = CripsDetail::all();
        $crips = Crips::orderBy('nama_crips')->get();
        return view('admin.cripsdetail.index', compact('cd','crips'));
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'deskripsi' => 'required',
            'kelompok' => 'required',
            'crips_id'=>'required'
        ]);

        $cd = CripsDetail::create([
            'deskripsi' => $request->deskripsi,
            'kelompok' => $request->kelompok,
            'crips_id'=>$request->crips_id
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data crips detail baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = CripsDetail::find($id);
        $crips = Crips::orderBy('nama_crips')->get();
        $send=[
            "data"=>$data,
            "crips"=>$crips,
    
        ];
        return view('admin.cripsdetail.edit',$send);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=CripsDetail::find($id);
        $data->crips_id=$request->crips_id;
        $data->deskripsi=$request->deskripsi;
        $data->kelompok=$request->kelompok;
        $data->save();

        //update user disini

        return redirect('/cripsdetail')->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=CripsDetail::find($id);
        $item->delete();
        return redirect('/cripsdetail')->with('success', 'Berhasil menghapus data crips!');

    }
}
