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
    return view('index');
});

Route::group(['prefix' => 'mata-kuliah'], function(){
    Route::get('/', 'MKController@home');
    Route::get('/create', 'MKController@create');
    Route::post('/create/submit','MKController@create_submit');
    Route::get('/edit/{id}', 'MKController@edit');
    Route::put('/edit/submit','MKController@edit_submit');
    Route::get('/delete/{id}', 'MKController@delete')->name('supplier.delete');
});

Route::group(['prefix' => 'jadwal'], function(){
    Route::get('/', 'JadwalController@home');
Route::group(['prefix' => 'ambil_kuliah'], function(){
	Route::get('/', 'AmbilKuliahController@index');

	Route::group(['prefix' => 'peserta'], function(){
		Route::post('/', 'AmbilKuliahController@peserta');
		Route::post('/angkatan', 'AmbilKuliahController@angkatan');
		Route::post('/delete', 'AmbilKuliahController@delete');
		Route::post('/tambah', 'AmbilKuliahController@tambah');
	});
});