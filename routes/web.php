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

Route::get('/index2', function () {
    return view('index2');
});

Route::get('/index3', function () {
    return view('index3');
});

Route::get('/pegawai', function () {
    return view('pegawai.index');
});

Route::group(['prefix' => 'pegawai'], function() {
	Route::get('/', function () {
	    return view('pegawai.index');
	});
	Route::get('tambah', function () {
	    return view('pegawai.tambah');
	});
	Route::get('edit', function () {
	    return view('pegawai.edit');
	});
});