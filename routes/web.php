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

Route::get('/index4', function () {
    return view('index4');
});


Route::group(['prefix' => 'jabatan'], function() {
 Route::get('/', ['as' => 'jabatan', 'uses' => 'JabatanController@index']);
 Route::get('tambah', 'JabatanController@create');
 Route::post('store', 'JabatanController@store');
 Route::get('edit/{id}', 'JabatanController@edit');
 Route::post('update/{id}', 'JabatanController@update');
 Route::post('delete/{id}', 'JabatanController@destroy');
});

Route::group(['prefix' => 'pegawai'], function() {
 Route::get('/', ['as' => 'pegawai', 'uses' => 'PegawaiController@index']);
 Route::get('tambah', 'PegawaiController@create');
 Route::post('store', 'PegawaiController@store');
 Route::get('edit/{id}', 'PegawaiController@edit');
 Route::post('update/{id}', 'PegawaiController@update');
 Route::post('delete/{id}', 'PegawaiController@destroy');
});

Route::group(['prefix' => 'anggaran'], function() {
 Route::get('/', ['as' => 'anggaran', 'uses' => 'AnggaranController@index']);
 Route::get('tambah', 'AnggaranController@create');
 Route::post('store', 'AnggaranController@store');
 Route::get('edit/{id}', 'AnggaranController@edit');
 Route::post('update/{id}', 'AnggaranController@update');
 Route::post('delete/{id}', 'AnggaranController@destroy');
});

Route::group(['prefix' => 'media'], function() {
 Route::get('/', ['as' => 'media', 'uses' => 'MediaController@index']);
 Route::get('tambah', 'MediaController@create');
 Route::post('store', 'MediaController@store');
 Route::get('edit/{id}', 'MediaController@edit');
 Route::post('update/{id}', 'MediaController@update');
 Route::post('delete/{id}', 'MediaController@destroy');
});

Route::group(['prefix' => 'topik'], function() {
 Route::get('/', ['as' => 'topik', 'uses' => 'TopikController@index']);
 Route::get('tambah', 'TopikController@create');
 Route::post('store', 'TopikController@store');
 Route::get('edit/{id}', 'TopikController@edit');
 Route::post('update/{id}', 'TopikController@update');
 Route::post('delete/{id}', 'TopikController@destroy');
});

Route::group(['prefix' => 'penyelenggara'], function() {
 Route::get('/', ['as' => 'penyelenggara', 'uses' => 'PenyelenggaraController@index']);
 Route::get('tambah', 'PenyelenggaraController@create');
 Route::post('store', 'PenyelenggaraController@store');
 Route::get('edit/{id}', 'PenyelenggaraController@edit');
 Route::post('update/{id}', 'PenyelenggaraController@update');
 Route::post('delete/{id}', 'PenyelenggaraController@destroy');
});

Route::group(['prefix' => 'direktorat'], function() {
 Route::get('/', ['as' => 'direktorat', 'uses' => 'DirektoratController@index']);
 Route::get('tambah', 'DirektoratController@create');
 Route::post('store', 'DirektoratController@store');
 Route::get('edit/{id}', 'DirektoratController@edit');
 Route::post('update/{id}', 'DirektoratController@update');
 Route::post('delete/{id}', 'DirektoratController@destroy');
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