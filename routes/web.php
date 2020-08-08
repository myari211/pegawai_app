<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Departement
Route::get('/department', 'DepartemenController@index');
Route::post('/departement/add', 'DepartemenController@add');
Route::post('/departement/edit', 'DepartemenController@edit');
Route::get('/departement/delete', 'DepartemenController@delete');

// Jabatan
Route::get('/jabatan', 'JabatanController@index');
Route::post('/jabatan/add', 'JabatanController@add');
Route::post('/jabatan/edit', 'JabatanController@edit');
Route::get('/jabatan/delete', 'JabatanController@delete');

//pegawai
Route::get('/pegawai', 'PegawaiController@index');
Route::post('/pegawai/add', 'PegawaiController@add');
Route::post('/pegawai/edit', 'PegawaiController@edit');
Route::post('/pegawai/delete', 'PegawaiController@delete');

//profile
Route::get('/profile/{id}', 'ProfileController@index');
Route::post('/profile/foto', 'ProfileController@foto');

//barang
Route::get('/barang', 'BarangController@index');
Route::post('/barang/add', 'BarangController@add');
Route::get('/barang/mutasi', 'BarangController@mutasi');
Route::post('/mutasi/add', 'BarangController@mutasi_add');
Route::post('/mutasi/out', 'BarangController@mutasi_out');