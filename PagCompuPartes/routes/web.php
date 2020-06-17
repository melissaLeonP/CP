<?php

Route::group(['middleware'=>['guest']],function(){
    Route::get('/login','Auth\LoginController@showLoginForm');
    
});

Route::get('/', function () {
    return view('contenido/contenido');
})->name('contenido');

Auth::routes();

Route::group(['middleware'=>['auth']],function(){

    Route::get('/consola', function () {
        return view('contenido/consola');
    })->name('consola');

    Route::group(['middleware'=>['Administrador']],function() {
        Route::get('/categoria','CategoriaController@selectCategorias');
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


        Route::post('/password/actualizar','PasswordController@update');
        Route::get('/logout','Auth\LoginController@logout')->name('logout');


        Route::get('/caracteristica_categoria','CaracteristicaCategoriaController@index');
        // Route::get('/caracteristicasDeCategoria','CaracteristicaCategoriaController@selectCaracteristicasCategorias');
        Route::get('/caracteristicas','CaracteristicaController@index');


    });

    Route::group(['middleware'=>['Marketing']],function() {
        
        Route::get('/slider','SliderController@index');
        Route::post('/slider/registrar','SliderController@store');
        Route::post('/slider/actualizar','SliderController@update');
        
        Route::post('/password/actualizar','PasswordController@update');
        Route::get('/logout','Auth\LoginController@logout')->name('logout');
    });
    // Route::get('/logout','Auth\LoginController@logout')->name('logout');
});


Route::get('/productos/computadoras', 'ProductoController@computadoras');
Route::get('/productos/{id}', 'ProductoController@show')->name('productos');
Route::get('/productos/laptops', 'ProductoController@laptops');
Route::get('/productos/monitores', 'ProductoController@monitores');
Route::get('/productos/servidores', 'ProductoController@servidores');

Route::get('/categoriaT','CategoriaController@selectCategoriasTienda');
Route::put('/categoria/productos/{id}','CategoriaController@categoriasProducto');

Route::get('/slider/index','SliderController@mostrar');

Route::get('/caracteristicasDeCategoria/{id}','CaracteristicaCategoriaController@selectCaracteristicasCategorias');



Route::post('contacto','MessageController@store');
