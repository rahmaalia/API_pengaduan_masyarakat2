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
Route::POST('/inputPengaduan','PengaduannRahmaController@inputFoto');
#UPLOAD FOTO
Route::POST('addFoto', '\App\Http\Controllers\PengaduannRahmaController@addFotoPengaduan');
Route::POST('foto','PengaduannRahmaController@foto');

Route::GET('getProses/{nik}', '\App\Http\Controllers\PengaduannRahmaController@getProses');
Route::GET('getSelesai/{nik}', '\App\Http\Controllers\PengaduannRahmaController@getSelesai');
Route::GET('getSemua', '\App\Http\Controllers\PengaduannRahmaController@getSemua');
Route::DELETE('delete/{id}', '\App\Http\Controllers\PengaduannRahmaController@delete');