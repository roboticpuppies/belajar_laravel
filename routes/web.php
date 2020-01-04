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
    return redirect('/buku');
});

Route::get('/buku', 'BukuController@index');
Route::post('/buku/store', 'BukuController@store');
Route::get('/buku/edit/{id}', 'BukuController@edit');
Route::get('/buku/delete/{id}', 'BukuController@delete');
Route::put('/buku/update/{id}', 'BukuController@update');

Route::get('/vcd', 'VCDController@index');
Route::post('/vcd/store', 'VCDController@store');
Route::get('/vcd/edit/{id}', 'VCDController@edit');
Route::get('/vcd/delete/{id}', 'VCDController@delete');
Route::put('/vcd/update/{id}', 'VCDController@update');

Route::get('/kategori', 'KategoriController@index');
Route::post('/kategori/store', 'KategoriController@store');
Route::get('/kategori/edit/{id}', 'KategoriController@edit');
Route::get('/kategori/delete/{id}', 'KategoriController@delete');
Route::put('/kategori/update/{id}', 'KategoriController@update');