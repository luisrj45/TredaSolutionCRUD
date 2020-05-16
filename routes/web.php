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
    return view('layouts.menu',compact('title'));
});

Route::get('/tienda', 'TiendaController@index')->name('listar_tienda');
Route::post('tiend', 'TiendaController@store')->name('crear_tienda');
Route::put('ed_tiend/{cod}', 'TiendaController@update')->name('editar_tienda');
Route::delete('el_tiend/{cod}', 'TiendaController@delete')->name('eliminar_tienda');

