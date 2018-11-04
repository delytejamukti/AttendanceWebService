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

Route::group(['prefix' => 'ambil_kuliah'], function(){
	Route::get('/', 'AmbilKuliahController@index');

	Route::group(['prefix' => 'peserta'], function(){
		Route::post('/', 'AmbilKuliahController@peserta');
		Route::post('/angkatan', 'AmbilKuliahController@angkatan');
		Route::post('/delete', 'AmbilKuliahController@delete');
		Route::post('/tambah', 'AmbilKuliahController@tambah');
	});
});