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
    return redirect()->route('login');
});

Route::get('/home', function () {
    return view('home.index');
});

Route::get('/admin/buku', 'BukuController@index')->middleware('can:isAdmin');
Route::post('/admin/buku/store', 'BukuController@store')->middleware('can:isAdmin');
Route::get('/admin/buku/edit/{id}', 'BukuController@edit')->middleware('can:isAdmin');
Route::get('/admin/buku/delete/{id}', 'BukuController@delete')->middleware('can:isAdmin');
Route::put('/admin/buku/update/{id}', 'BukuController@update')->middleware('can:isAdmin');

Route::get('/admin/vcd', 'VCDController@index')->middleware('can:isAdmin');
Route::post('/admin/vcd/store', 'VCDController@store')->middleware('can:isAdmin');
Route::get('/admin/vcd/edit/{id}', 'VCDController@edit')->middleware('can:isAdmin');
Route::get('/admin/vcd/delete/{id}', 'VCDController@delete')->middleware('can:isAdmin');
Route::put('/admin/vcd/update/{id}', 'VCDController@update')->middleware('can:isAdmin');

Route::get('/admin/kategori', 'KategoriController@index')->middleware('can:isAdmin');
Route::post('/admin/kategori/store', 'KategoriController@store')->middleware('can:isAdmin');
Route::get('/admin/kategori/edit/{id}', 'KategoriController@edit')->middleware('can:isAdmin');
Route::get('/admin/kategori/delete/{id}', 'KategoriController@delete')->middleware('can:isAdmin');
Route::put('/admin/kategori/update/{id}', 'KategoriController@update')->middleware('can:isAdmin');

Route::get('/admin/users', 'UserController@index')->middleware('can:isAdmin');
Route::post('/admin/users/store', 'UserController@store')->middleware('can:isAdmin');
Route::get('/admin/users/delete/{id}', 'UserController@delete')->middleware('can:isAdmin');

Route::get('/siswa/pinjamanku', 'SiswaController@pinjamanku')->middleware('can:isSiswa');
Route::post('/siswa/updatepassword', 'SiswaController@updatepassword')->middleware('can:isSiswa');
Route::post('/siswa/updatediri', 'SiswaController@updatediri');
Auth::routes();