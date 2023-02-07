<?php

namespace App\Http\Controllers;

use App\Models\Crips;
use Illuminate\Http\Request;

class CripsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crips = Crips::all();
        return view('admin.crips.index', compact('crips'));
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
            'nama_crips' => 'required'
        ]);

        $crips = Crips::create([
            'nama_crips' => $request->nama_crips
        ]);
        return redirect()->back()->with('success', 'Berhasil menambahkan data crips baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crips  $crips
     * @return \Illuminate\Http\Response
     */
    public function show(Crips $crips)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crips  $crips
     * @return \Illuminate\Http\Response
     */
    public function edit(Crips $crips, $id)
    {
        $item = Crips::find($id);
        $crips = Crips::orderBy('nama_crips')->get();

        $send=[
            "item" => $item
        ];

        return view('admin.crips.edit', $send);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crips  $crips
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crips $crips, $id)
    {

        $item = Crips::find($id);
        $item->nama_crips=$request->nama_crips;
        $item->save();

       return redirect()->back()->with('success', 'Berhasil update data crips!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crips  $crips
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crips $crips, $id)
    {
        $item=Crips::find($id);
        $item->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data crips!');

    }
}