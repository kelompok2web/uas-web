<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\User;
use DB;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        return view('admin.jurusan.index', compact('jurusan'));
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
            'nama_jurusan' => 'required',
        ]);

        $jurusan = Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
        ]);
        return redirect()->back()->with('success', 'Berhasil menambahkan data jurusan baru!');
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
        $data=Jurusan::find($id);
        $jurusan = Jurusan::orderBy('nama_jurusan')->get();

        $send=[
            "data"=>$data,
        ];
        return view('admin.jurusan.edit',$send);
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
        $data=Jurusan::find($id);
        $data->nama_jurusan=$request->nama_jurusan;
        $data->save();

        return redirect('/jurusan')->with('success', 'Berhasil mengubah data');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        DB::beginTransaction();

        try {
            $data=Jurusan::find($id);
            $data->delete();
    
            //delete user disini
            DB::commit();
            return redirect('/jurusan')->with('success', 'Berhasil Menghapus data');
        }catch(\Throwable $e) {
            DB::rollBack();
            return redirect('/jurusan')->with('success', 'Gagal Menghapus data');
        }

    }

    public function trash()
    {
        $jrs= Jurusan::onlyTrashed()->get();
        return view('admin.jurusan.trash', compact('jrs'));
    }

    public function restore($id)
    {
        $jrs = Jurusan::withTrashed()->findorfail($id);
        $countUser = Jurusan::withTrashed()->where('nama_jurusan', $jrs->nama_jurusan)->count();
        if ($countUser >= 1) {
            $user = Jurusan::withTrashed()->where('nama_jurusan', $jrs->nama_jurusan)->first();
            $jrs->restore();
            $user->restore();
            return redirect()->back()->with('info', 'Data jurusan berhasil direstore! (Silahkan cek data jurusan)');
        } else {
            $jrs->restore();
            return redirect()->back()->with('info', 'Data jurusan berhasil direstore! (Silahkan cek data jurusan)');
        }
    }

    public function execute($id)
    {
        $jrs = Jurusan::withTrashed()->findorfail($id);
        $countUser = Jurusan::withTrashed()->where('nama_jurusan', $jrs->nama_jurusan)->count();
        if ($countUser >= 1) {
            $user = Jurusan::withTrashed()->where('nama_jurusan', $jrs->nama_jurusan)->first();
            $jrs->forceDelete();
            $user->forceDelete();
            return redirect()->back()->with('success', 'Data jurusan berhasil dihapus secara permanent');
        } else {
            $jrs->forceDelete();
            return redirect()->back()->with('success', 'Data jurusan berhasil dihapus secara permanent');
        }
    }

}
