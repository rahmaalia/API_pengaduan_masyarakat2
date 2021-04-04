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

Route::get('/login','AuthWebController@login');
Route::post('/postlogin','AuthWebController@postlogin');

Route::get('/dashboard','DashboardController@index');
Route::get('/pengaduan','PengaduanWebController@index');
Route::post('/pengaduan/{id}/inputTanggapan','PengaduanWebController@inputTanggapan');
Route::get('/masyarakat','MasyarakattRahmaController@index');
Route::get('/petugas','PetugassRahmaController@index');

