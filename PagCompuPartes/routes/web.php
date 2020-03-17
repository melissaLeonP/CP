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

Route::get('/slider','SliderController@index');
Route::get('/slider/registrar','SliderController@update');
Route::get('/slider/actualizar','SliderController@actualizar');
Route::get('/slider/desactivar','SliderController@desactivar');
Route::get('/slider/activar','SliderController@activar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
