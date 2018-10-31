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

Route::get('/mahasiswa', 'MahasiswaController@read');
Route::get('/mahasiswa/create', 'MahasiswaController@create');
Route::post('/mahasiswa/store', 'MahasiswaController@store');
Route::get('/mahasiswa/{nrp}/edit', 'MahasiswaController@edit');
Route::post('/mahasiswa/{nrp}', 'MahasiswaController@update');
Route::get('/mahasiswa/delete/{nrp}', 'MahasiswaController@destroy');

Route::get('/dosen', 'DosenController@read');
Route::get('/dosen/create', 'DosenController@create');
Route::post('/dosen/store', 'DosenController@store');
Route::get('/dosen/{nip}/edit', 'DosenController@edit');
Route::post('/dosen/{nip}', 'DosenController@update');
Route::get('/dosen/delete/{nip}', 'DosenController@destroy');

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
});