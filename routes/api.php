<?php

use Illuminate\Http\Request;

Route::get('/barang','BarangController@index');
Route::post('/barang','BarangController@add');
Route::put('/barang/{$id}','BarangController@update');
Route::delete('/barang/{$id}','BarangController@delete');

Route::resource('barang2','Barang2Controller');