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

Route::group(['middleware'=>['guest']],function(){
    Route::get('/login','Auth\LoginController@showLoginForm');
    
});

Route::get('/', function () {
    return view('contenido/contenido');
});

Auth::routes();

Route::group(['middleware'=>['auth']],function(){

    Route::get('/consola', function () {
        return view('contenido/consola');
    })->name('consola');

    Route::get('/logout','Auth\LoginController@logout')->name('logout');

    Route::get('/categoria','CategoriaController@index');
    Route::post('/categoria/registrar','CategoriaController@store');
    Route::post('/categoria/actualizar','CategoriaController@update');
    Route::put('/categoria/desactivar','CategoriaController@desactivar');
    Route::put('/categoria/activar','CategoriaController@activar');
    
    Route::get('/slider','SliderController@index');
    Route::post('/slider/registrar','SliderController@store');
    Route::post('/slider/actualizar','SliderController@update');

    Route::get('/productos','ProductoController@index');
    Route::post('/productos/registrar','ProductoController@store');
    Route::get('/productos/actualizar','ProductoController@update');
    Route::get('/productos/desactivar','ProductoController@desactivar');
    Route::get('/productos/activar','ProductoController@activar');

    Route::get('/caracteristicas','CaracteristicaController@index');



    Route::post('/password/actualizar','PasswordController@update');


});

// Route::get('/slider/desactivar','SliderController@desactivar');
// Route::get('/slider/activar','SliderController@activar');


// Route::get('/home', 'HomeController@index')->name('home');
