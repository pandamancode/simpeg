<?php
use Illuminate\Http\Request;
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
    return redirect('/home');
    //return view('_layouts/main');
});

//home
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/home', 'HomeController@index');

//route pegawai
Route::get('/pegawai', 'DatapegawaiController@index');
Route::get('/pegawai/add', 'DatapegawaiController@add');
Route::post('/pegawai/store', 'DatapegawaiController@store');
Route::get('/pegawai/edit/{nik}', 'DatapegawaiController@edit');
Route::post('/pegawai/update', 'DatapegawaiController@update');
Route::post('/pegawai/hapus', 'DatapegawaiController@delete');

//route mitra
Route::get('/mitra', 'MitraController@index');
Route::get('/mitra/add', 'MitraController@add');
Route::post('/mitra/store', 'MitraController@store');
Route::get('/mitra/edit/{id_mitra}', 'MitraController@edit');
Route::post('/mitra/update', 'MitraController@update');
Route::post('/mitra/hapus', 'MitraController@delete');

//route penempatan
Route::get('/penempatan', 'PenempatanController@index');
Route::get('/penempatan/add', 'PenempatanController@add');
Route::post('/penempatan/store', 'PenempatanController@store');
Route::get('/penempatan/edit/{id_penempatan}', 'PenempatanController@edit');
Route::post('/penempatan/update', 'PenempatanController@update');
Route::post('/penempatan/hapus', 'PenempatanController@delete');
Route::post('/penempatan/nonaktif', 'PenempatanController@nonaktif');

//route Honor
Route::get('/honor', 'HonorController@index');
Route::get('/honor/add', 'HonorController@add');
Route::post('/honor/store', 'HonorController@store');
Route::get('/honor/edit/{id_honor}', 'HonorController@edit');
Route::post('/honor/update', 'HonorController@update');
Route::post('/honor/hapus', 'HonorController@delete');

//route Entry Gaji
Route::get('/gaji', 'GajiController@index');
Route::post('/gaji/filter', 'GajiController@filter');
Route::post('/gaji/add', 'GajiController@add');
Route::post('/gaji/data_gaji', 'GajiController@data_gaji');
Route::post('/gaji/entry', 'GajiController@store');
Route::post('/gaji/update', 'GajiController@update');
Route::post('/gaji/update_proses', 'GajiController@update_proses');
Route::post('/gaji/hapus', 'GajiController@delete');
Route::get('/gaji/slip/{id_honor}', 'GajiController@slip');
Auth::routes();

//route Users
Route::get('/users', 'UserController@index');
Route::get('/users/register', 'UserController@register');
Route::post('/users/store', 'UserController@store');
Route::get('/users/edit/{id}', 'UserController@edit');
Route::post('/users/update', 'UserController@update');
Route::post('/users/hapus', 'UserController@delete');

//route Laporan
Route::get('/laporan', 'LaporanController@index');