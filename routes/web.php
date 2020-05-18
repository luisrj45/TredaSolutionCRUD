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
	$title="Inicio";
                  Log::channel('slack')->warning("el usuario busco la tienda :".$title);

    return view('layouts.menu',compact('title'));
});

Route::get('/tiendas', 'TiendaController@index')->name('listar_tienda'); 
Route::post('tiend', 'TiendaController@store')->name('crear_tienda');
Route::put('ed_tiend/{cod}', 'TiendaController@update')->name('editar_tienda');
Route::delete('el_tiend/{cod}', 'TiendaController@delete')->name('eliminar_tienda');

Route::get('/productos', 'ProductoController@index')->name('listar_producto'); 
Route::post('product', 'ProductoController@store')->name('crear_producto');
Route::put('ed_product/{cod}', 'ProductoController@update')->name('editar_producto');
Route::delete('el_product/{cod}', 'ProductoController@delete')->name('eliminar_producto');
Route::post('imag_article', 'ProductoController@imagen')->name('imagen_producto');

Route::get('multiplos', 'LogicaController@multiplos')->name('listar_multiplos'); 
Route::get('camelcase', 'LogicaController@camelcase')->name('listar_camel'); 
Route::get('frase', 'LogicaController@frase')->name('listar_frase'); 

Route::get('mysql', function(){
	$title="Mysql";
    return view('mysql.index',compact('title'));
})->name('listar_mysql'); 
Route::get('rest', function(){
	$title="Rest";
    return view('rest.index',compact('title'));
})->name('Servicio_rest'); 
Route::get('rest_api/{cod}', 'RestController@index')->name('buscar_producto');

