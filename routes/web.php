<?php

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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login','AuthWebController@login')->middleware('guest');
Route::post('/postlogin','AuthWebController@postlogin');
Route::get('/logout', 'AuthWebController@logout');

Route::middleware(['auth:web'])->group(function () {
    Route::get('/dashboard','DashboardController@index');

    #PENGADUAN
    Route::get('/pengaduan','PengaduanWebController@index');
    Route::post('/search','PengaduanWebController@search');
    Route::get('/pengaduan/{id}/inputTanggapan','PengaduanWebController@inputTanggapan');

    #MASYARAKAT
    Route::get('/masyarakat','MasyarakattRahmaController@index');
    Route::get('/deleteMasyarakat/{id}','MasyarakattRahmaController@delete');
    Route::post('/tambahmasyarakat','MasyarakattRahmaController@store');
    Route::get('/tambahmasyarakat','MasyarakattRahmaController@create');

    #PETUGAS
    Route::post('/update/{id}','PetugassRahmaController@editpetugas');
    Route::get('/petugas','PetugassRahmaController@index');
    Route::get('/tambahpetugas','PetugassRahmaController@create');
    Route::post('/tambah','PetugassRahmaController@store');
    Route::get('/deletePetugas/{id}','PetugassRahmaController@delete');
    Route::get('/edit/{id}','PetugassRahmaController@edit');
    

    #TANGGAPAN
    Route::get('/isitanggapan/{id}', 'TanggapanWebController@isitanggapan');
    Route::post('/kirim/{id}','TanggapanWebController@kirim');

    #LAPORAN
    Route::get('/laporan', 'laporanController@laporan');
    Route::get('/laporan/cetak', 'laporanController@cetak');
    Route::get('/laporan/cetak/proses', 'laporanController@cetakProses');
    Route::get('/laporan/cetak/selesai', 'laporanController@cetakSelesai');
    Route::get('/laporan/cetak/ver', 'laporanController@cetakVer');
    
    
});