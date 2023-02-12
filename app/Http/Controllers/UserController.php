<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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
        if (Auth::user()->role == "Admin") {
            $user = User::where('role', $id)->get();
            $role = $user->groupBy('role');
            return view('admin.user.show', compact('user', 'role'));
           
        } else {
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

    public function profile()
    {
        return view('user.pengaturan');
    }

    public function edit_profile()
    {
        $prodi = Prodi::all();
        return view('user.profile', compact('prodi'));
    }

    public function ubah_profile(Request $request)
    {
        if ($request->user()->role == 'Mahasiswa')
        {
            // $this->validate($request, [
            //     'nama_guru' => 'required',
            //     'id_mapel' => 'required',
            //     'jk' => 'required',
            // ]);
    
            $mhs = Mahasiswa::where('nim_mahasiswa', Auth::user()->nim_mahasiswa)->first();
            $user = User::where('nim_mahasiswa', Auth::user()->nim_mahasiswa)->first();
            if ($user) {
                $user_data = [
                    'name' => $request->name
                ];
                $user->update($user_data);
            } 
            $mhs_data = [
                'nama_mahasiswa' => $request->name,
                'jk' => $request->jk,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir
            ];
            $mhs->update($mhs_data);
    
            return redirect('profile')->with('success', 'Data Mahasiswa berhasil diperbarui!');
            
        }
        
        else
        {
            $user = User::findorfail(Auth::user()->id);
            $data_user = [
                'name' => $request->name,
            ];
            $user->update($data_user);
            return redirect('profile')->with('success', 'Profile anda berhasil diperbarui!');
        }
    }

    public function edit_password()
    {
        return view('user.ubah-password');
    }

    public function ubah_password(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:8|confirmed'
        ]);
        $user = User::findorfail(Auth::user()->id);
        if ($request->password_lama) {
            if (Hash::check($request->password_lama, $user->password)) {
                if ($request->password_lama == $request->password) {
                    return redirect()->back()->with('error', 'Maaf password yang anda masukkan sama!');
                } else {
                    $user_password = [
                        'password' => Hash::make($request->password),
                    ];
                    $user->update($user_password);
                    return redirect('profile')->with('success', 'Password anda berhasil diperbarui!');
                }
            } else {
                return redirect()->back()->with('error', 'Masukkan password lama anda dengan benar!');
            }
        } else {
            return redirect()->back()->with('error', 'Masukkan password lama anda terlebih dahulu!');
        }
        
    }


    public function edit_email()
    {
        return view('user.ubah-email');
    }

    public function ubah_email(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email'
        ]);
        $user = User::findorfail(Auth::user()->id);
        $cekUser = User::where('email', $request->email)->count();
        if ($cekUser >= 1) {
            return redirect()->back()->with('error', 'Maaf email ini sudah terdaftar!');
        } else {
            $user_email = [
                'email' => $request->email,
            ];
            $user->update($user_email);
            return redirect('profile')->with('success', 'Email anda berhasil diperbarui!');
        }
    }


}
