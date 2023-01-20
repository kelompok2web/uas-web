<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.beranda');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});

Route::resource('jurusan', JurusanController::class);
Route::POST('/jurusan/update/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
Route::GET('/jurusan/destroy/{id}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');


Route::resource('prodi', ProdiController::class);
Route::GET('/prodi/destroy/{id}', [ProdiController::class, 'destroy'])->name('prodi.destroy');
Route::POST('/prodi/update/{id}', [ProdiController::class, 'update'])->name('prodi.update');


Route::resource('/mahasiswa', MahasiswaController::class);
Route::POST('/mahasiswa/updateV2/{id}', [MahasiswaController::class, 'updateV2'])->name('mahasiswa.updateV2');
Route::GET('/mahasiswa/destroyV2/{id}', [MahasiswaController::class, 'destroyV2'])->name('mahasiswa.destroyV2');

Route::resource('user', UserController::class);