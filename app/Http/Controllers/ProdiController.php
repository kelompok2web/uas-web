<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
use App\Models\Prodi;
use App\Models\User;
use DB;
class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = Jurusan::orderBy('nama_jurusan')->get();
        $prodi = Prodi::all();
        // return $prodi;
        //looping
        for ($i=0; $i < count($prodi); $i++) { 
            $prodi[$i]->jurusans=Jurusan::find($prodi[$i]->jurusan_id);
        }
        // return $prodi;
        
        return view('admin.prodi.index', compact('jurusan','prodi'));
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
            'nama_prodi' => 'required',
            'jurusan_id' => 'required',
        ]);

        $prodi = Prodi::create([
            'nama_prodi' => $request->nama_prodi,
            'jurusan_id' => $request->jurusan_id,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data prodi baru!');
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
        $data=Prodi::find($id);
        $jurusan = Jurusan::orderBy('nama_jurusan')->get();
        $send=[
            "data"=>$data,
            "jurusan"=>$jurusan,
    
        ];
        return view('admin.prodi.edit',$send);
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
        $data=Prodi::find($id);
        $data->nama_prodi=$request->nama_prodi;
        $data->jurusan_id=$request->jurusan_id;
        $data->save();

        //update user disini

        return redirect('/prodi')->with('success', 'Berhasil mengubah data');
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
            $data=Prodi::find($id);
            $data->delete();
    
            //delete user disini
            DB::commit();
            return redirect('/prodi')->with('success', 'Berhasil Menghapus data');
        }catch(\Throwable $e) {
            DB::rollBack();
            return redirect('/prodi')->with('success', 'Gagal Menghapus data');
        }
    }

    public function trash()
    {
        $prodi= Prodi::onlyTrashed();
        return view('admin.prodi.trash', compact('prodi'));
    }

    public function restore($id)
    {
        $prodi = Prodi::withTrashed()->findorfail($id);
        $countUser = Prodi::withTrashed()->where('nama_prodi', $prodi->nama_prodi)->count();
        if ($countUser >= 1) {
            $user = Prodi::withTrashed()->where('nama_prodi', $prodi->nama_prodi)->first();
            $prodi->restore();
            $user->restore();
            return redirect()->back()->with('info', 'Data Prodi berhasil direstore! (Silahkan cek data Prodi)');
        } else {
            $prodi->restore();
            return redirect()->back()->with('info', 'Data Prodi berhasil direstore! (Silahkan cek data Prodi)');
        }
    }

    public function execute($id)
    {
        $prodi = Prodi::withTrashed()->findorfail($id);
        $countUser = Prodi::withTrashed()->where('nama_prodi', $prodi->nama_prodi)->count();
        if ($countUser >= 1) {
            $user = Prodi::withTrashed()->where('nama_prodi', $prodi->nama_prodi)->first();
            $prodi->forceDelete();
            $user->forceDelete();
            return redirect()->back()->with('success', 'Data Prodi berhasil dihapus secara permanent');
        } else {
            $prodi->forceDelete();
            return redirect()->back()->with('success', 'Data Prodi berhasil dihapus secara permanent');
        }
    }


}
