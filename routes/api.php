<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register', '\App\Http\Controllers\RegistrasiController@register');
Route::post('login', '\App\Http\Controllers\AuthController@login');
Route::resource('/biomasyarakat','MasyarakattRahmaController');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

#UPLOAD FOTO
Route::POST('tambahFoto', '\App\Http\Controllers\PengaduannRahmaController@addFotoPengaduan');
Route::POST('foto','PengaduannRahmaController@foto');

#PENGADUAN
Route::GET('getProses/{nik}', '\App\Http\Controllers\PengaduannRahmaController@getProses');
Route::GET('getSelesai/{nik}', '\App\Http\Controllers\PengaduannRahmaController@getSelesai');
Route::GET('getSemua', '\App\Http\Controllers\PengaduannRahmaController@getSemua');
Route::GET('delete/{id}', '\App\Http\Controllers\PengaduannRahmaController@delete');
Route::POST('getFoto/{photo_name}', '\App\Http\Controllers\PengaduannRahmaController@getPhotoProduct');

#TANGGAPAN (petugas)
Route::POST('tanggapan', '\App\Http\Controllers\TanggapannRahmaController@tanggapan');
Route::PUT('updateStatus/{id}','PengaduannRahmaController@UpdateStatus');
Route::GET('getProsesPetugas', '\App\Http\Controllers\PengaduannRahmaController@getProsesPetugas');
Route::GET('getSelesaiPetugas', '\App\Http\Controllers\PengaduannRahmaController@getSelesaiPetugas');
Route::GET('getTanggapan/{id}', '\App\Http\Controllers\TanggapannRahmaController@getTanggapan');
Route::GET('getVerifikasiPetugas', '\App\Http\Controllers\PengaduannRahmaController@getVerifikasiPetugas');

#MASYARAKAT
Route::PUT('update/{nik}','MasyarakattRahmaController@update');
Route::PUT('updateUser/{id}','MasyarakattRahmaController@updateUser');
Route::GET('getMasyarakat/{nik}', '\App\Http\Controllers\MasyarakattRahmaController@getMasyarakat');