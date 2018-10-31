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
    Route::get('/', 'MKController@index');
    Route::get('/create', 'MKController@create');
    Route::post('/create/submit','MKController@create_submit');
    Route::get('/edit/{id}', 'MKController@edit');
    Route::put('/edit/submit','MKController@edit_submit');
    Route::delete('/delete/{id}', 'MKController@delete')->name('matakuliah.delete');
});

Route::group(['prefix' => 'jadwal'], function(){
    Route::get('/', 'JadwalController@index');
    Route::get('/create', 'JadwalController@create');
    Route::post('/create/submit','JadwalController@create_submit');
    Route::get('/edit/{id}', 'JadwalController@edit');
    Route::put('/edit/submit','JadwalController@edit_submit');
    Route::delete('/delete/{id}', 'JadwalController@delete')->name('jadwal.delete');
});