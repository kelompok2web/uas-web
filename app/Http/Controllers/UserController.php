<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $user = $user->groupBy('role');
        return view('admin.user.index', compact('user'));
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required',
        ]);
        if($request->role == 'Mahasiswa')

        if ($request->role == 'Mahasiswa')
        {
            $countMhs = Mahasiswa::where('nim_mahasiswa', $request->nim_mhs)->count();
            $mhsId = Mahasiswa::where('nim_mahasiswa', $request->nim_mhs)->get();
            foreach ($mhsId as $val) {
                $mhs = Mahasiswa::findorfail($val->id);
            }
            if ($countMhs >= 1) {
                User::create([
                    'name' => strtolower($mhs->nama_mahasiswa),
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role' => $request->role,
                    'nim_mahasiswa' => $request->nim_mhs,
                ]);
                return redirect()->back()->with('success', 'Berhasil menambahkan user Mahasiswa baru!');
            } else {
                return redirect()->back()->with('error', 'Maaf User ini tidak terdaftar sebagai Mahasiswa!');
            }
        }
        else
        {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
            return redirect()->back()->with('success', 'Berhasil menambahkan user Admin baru!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->role == "Admin") 
        {
            $user = User::where('role', $id)->get();
            $role = $user->groupBy('role');
            return view('admin.user.show', compact('user', 'role'));
            
        } 
        else 
        {
            return redirect()->back()->with('warning', 'Maaf halaman ini hanya bisa di akses oleh Admin!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
