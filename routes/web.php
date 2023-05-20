<?php

use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\RapatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/postlogin',[AuthController::class,'postlogin'])->name('postlogin');
Route::get('/logout',[AuthController::class,'logout']);


Route::get('/dashboard',[DashboardController::class,'dashboardPegawaidanMasyarakat']);


Route::group(['middleware'=>['auth','cek_login:14']], function(){
    
    Route::get('/dashboardAdmin',[DashboardController::class,'dashboardAdmin']);

        //Pegawai 
    Route::get('/daftar_pegawai',[UserController::class,'index']);
    Route::post('daftar_pegawai/create',[UserController::class,'create']);
    Route::get('daftar_pegawai/{nik_nip}/edit',[UserController::class,'edit']);
    Route::post('daftar_pegawai/{nik_nip}/update',[UserController::class,'update']);
    Route::get('daftar_pegawai/{nik_nip}/delete',[UserController::class,'delete']);

        //kegiatan
    Route::get('/daftar_kegiatan',[KegiatanController::class,'index']);
    Route::post('daftar_kegiatan/create',[KegiatanController::class,'create']);
    Route::get('daftar_kegiatan/{id_kegiatan}/edit',[KegiatanController::class,'edit']);
    Route::post('daftar_kegiatan/{id_kegiatan}/update',[KegiatanController::class,'update']);
    Route::get('daftar_kegiatan/{id_kegiatan}/delete',[KegiatanController::class,'delete']);

});

Route::group(['middleware'=>['auth','cek_login:1,2,3,4,5,6,7,8,9,10,11,12,13,14']], function(){
//aktivitas
Route::get('/log_aktivitas',[AktivitasController::class,'index']);
Route::post('log_aktivitas/create',[AktivitasController::class,'create']);
Route::get('log_aktivitas/{id_aktivitas}/edit',[AktivitasController::class,'edit']);
Route::post('log_aktivitas/{id_aktivitas}/update',[AktivitasController::class,'update']);
Route::get('log_aktivitas/{id_aktivitas}/delete',[AktivitasController::class,'delete']);

Route::get('/print_aktivitas',[AktivitasController::class,'print_aktivitas']);
Route::get('/display_laporan',[AktivitasController::class,'displayLaporan']);
Route::get('/cetak_laporan/{tgl_awal}/{tgl_akhir}',[AktivitasController::class,'store']);


Route::get('profile/{nik_nip}',[UserController::class,'setting_profil']);
Route::post('profile/{nik_nip}/update',[UserController::class,'profil_update']);

Route::get('change_password/{nik_nip}',[UserController::class,'change_password']);
Route::post('change_password/{nik_nip}/update',[UserController::class,'password_update']);

});



// //Jabatan
// Route::get('/jabatan',[JabatanController::class,'index']);
// Route::post('jabatan/create',[JabatanController::class,'create']);
// Route::get('jabatan/{id_jabatan}/edit',[JabatanController::class,'edit']);
// Route::post('jabatan/{id_jabatan}/update',[JabatanController::class,'update']);
// Route::get('jabatan/{id_jabatan}/delete',[JabatanController::class,'delete']);

//     //Kategori
//     Route::get('/kategori',[KategoriController::class,'index']);
//     Route::post('kategori/create',[KategoriController::class,'create']);
//     Route::get('kategori/{id_kategori}/edit',[KategoriController::class,'edit']);
//     Route::post('kategori/{id_kategori}/update',[KategoriController::class,'update']);
//     Route::get('kategori/{id_kategori}/delete',[KategoriController::class,'delete']);
    

// //status
// Route::get('/status',[StatusController::class,'index']);
// Route::post('status/create',[StatusController::class,'create']);
// Route::get('status/{id_status}/edit',[StatusController::class,'edit']);
// Route::post('status/{id_status}/update',[StatusController::class,'update']);
// Route::get('status/{id_status}/delete',[StatusController::class,'delete']);




// //Rapat
// Route::get('/jadwal_rapat',[RapatController::class,'index']);
// Route::post('jadwal_rapat/create',[RapatController::class,'create']);
// Route::get('jadwal_rapat/{id_rapat}/edit',[RapatController::class,'edit']);
// Route::post('jadwal_rapat/{id_rapat}/update',[RapatController::class,'update']);
// Route::get('jadwal_rapat/{id_rapat}/delete',[RapatController::class,'delete']);


