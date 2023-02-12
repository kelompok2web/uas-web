<?php

use App\Http\Controllers\AtributController;
use App\Http\Controllers\CripsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SawController;
use App\Http\Controllers\CripsDetailController;
use App\Http\Controllers\BerandaController;


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

Route::GET('/', [BerandaController::class, 'index'])->name('beranda.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class,'profile'])->name('profile');
    Route::get('/pengaturan/profile', [UserController::class,'edit_profile']) ->name('pengaturan.profile');
    Route::post('/pengaturan/ubah-profile', [UserController::class,'ubah_profile']) ->name('pengaturan.ubah-profile');
    Route::get('/pengaturan/edit-password', [UserController::class,'edit_password']) ->name('pengaturan.edit-password');
    Route::post('/pengaturan/ubah-password', [UserController::class,'ubah_password']) ->name('pengaturan.ubah-password');
    Route::get('/pengaturan/edit-email', [UserController::class,'edit_email']) ->name('pengaturan.edit-email');
    Route::post('/pengaturan/ubah-email', [UserController::class,'ubah_email']) ->name('pengaturan.ubah-email');
     
    Route::middleware(['admin'])->group(function () {
        Route::middleware(['trash'])->group(function (){
            Route::get('/admin/mahasiswa/trash', [MahasiswaController::class,'trash'])->name('mahasiswa.trash');
            Route::get('/mahasiswa/restore/{id}', [MahasiswaController::class,'restore'])->name('mahasiswa.restore');
            Route::delete('/mahasiswa/execute/{id}', [MahasiswaController::class,'execute'])->name('mahasiswa.execute');
        });

        Route::middleware(['trash'])->group(function (){
            Route::get('/admin/jurusan/trash', [JurusanController::class,'trash'])->name('jurusan.trash');
            Route::get('/jurusan/restore/{id}', [JurusanController::class,'restore'])->name('jurusan.restore');
            Route::delete('/jurusan/execute/{id}', [JurusanController::class,'execute'])->name('jurusan.execute');
        });

        Route::middleware(['trash'])->group(function (){
            Route::get('/admin/prodi/trash', [ProdiController::class,'trash'])->name('prodi.trash');
            Route::get('/prodi/restore/{id}', [ProdiController::class,'restore'])->name('prodi.restore');
            Route::delete('/prodi/execute/{id}', [ProdiController::class,'execute'])->name('prodi.execute');
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

        Route::resource('/saw', SawController::class);
        Route::resource('/kriteria', KriteriaController::class);
        Route::resource('/crips', CripsController::class);
        Route::resource('/cripsdetail', CripsDetailController::class);
        Route::resource('/atribut', AtributController::class);
        Route::GET('/atr-saw', [SAWController::class, 'indexC'])->name('atr-saw.indexC');
        Route::GET('/atr-saw/hasil', [SAWController::class, 'sampleC'])->name('atr-saw.sampleC');
        Route::GET('/atr-saw/hasil2', [SAWController::class, 'sample2C'])->name('atr-saw.sample2C');
        Route::GET('/atr-saw/hasil3', [SAWController::class, 'sample3C'])->name('atr-saw.sample3C');
        Route::GET('/atr-saw/hasil3PDF', [SAWController::class, 'sample3PDFC'])->name('atr-saw.sample3PDFC');

        Route::GET('/atr-test', [SAWController::class, 'test'])->name('atr-saw.test');
    });

    Route::middleware(['mahasiswa'])->group(function (){
        Route::GET('/atr-saw/mhs/hasil', [SAWController::class, 'mahasiswaC'])->name('atr-saw.mahasiswaC');
        Route::POST('/atr-saw/mhs/atribut', [AtributController::class, 'store2'])->name('atr-saw.store');
        Route::GET('/atr-saw/mhs/index', [AtributController::class, 'index2'])->name('atr-saw.index');
    });
});