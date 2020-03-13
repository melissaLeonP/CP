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
    return view('contenido/consola');
});

Route::get('/categoria','CategoriaController@index');
Route::get('/categoria/registrar','CategoriaController@update');
Route::get('/categoria/actualizar','CategoriaController@actualizar');
Route::get('/categoria/desactivar','CategoriaController@desactivar');
Route::get('/categoria/activar','CategoriaController@activar');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
