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

Route::group(['prefix' => 'anggaran'], function() {
	Route::get('/', function () {
	    return view('anggaran.index');
	});
	Route::get('tambah', function () {
	    return view('anggaran.tambah');
	});
	Route::get('edit', function () {
	    return view('anggaran.edit');
	});
});

Route::group(['prefix' => 'penyelenggara'], function() {
	Route::get('/', function () {
	    return view('penyelenggara.index');
	});
	Route::get('tambah', function () {
	    return view('penyelenggara.tambah');
	});
	Route::get('edit', function () {
	    return view('penyelenggara.edit');
	});
});

Route::group(['prefix' => 'jabatan'], function() {
	Route::get('/', function () {
	    return view('jabatan.index');
	});
	Route::get('tambah', function () {
	    return view('jabatan.tambah');
	});
	Route::get('edit', function () {
	    return view('jabatan.edit');
	});
});

Route::group(['prefix' => 'direktorat'], function() {
	Route::get('/', function () {
	    return view('direktorat.index');
	});
	Route::get('tambah', function () {
	    return view('direktorat.tambah');
	});
	Route::get('edit', function () {
	    return view('direktorat.edit');
	});
});

Route::group(['prefix' => 'topik'], function() {
	Route::get('/', function () {
	    return view('topik.index');
	});
	Route::get('tambah', function () {
	    return view('topik.tambah');
	});
	Route::get('edit', function () {
	    return view('topik.edit');
	});
});

Route::group(['prefix' => 'training'], function() {
	Route::get('/', function () {
	    return view('training.index');
	});
	Route::get('tambah', function () {
	    return view('training.tambah');
	});
	Route::get('edit', function () {
	    return view('training.edit');
	});
});