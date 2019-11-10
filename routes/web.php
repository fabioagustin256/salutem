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

// Departamentos y localidades

Route::get('departamentos/listar', 'DepartamentoController@listar')->name('departamentos.listar');

Route::get('localidades/localidadesdepartamento/{id}', 'LocalidadController@localidadesdepartamento')->name('localidades.localidadesdepartamento');


// Personas, ocupaciones

Route::get('/', 'PersonaController@index')->name('inicio');

Route::resource('personas', 'PersonaController');

Route::get('ocupaciones/listar', 'OcupacionController@listar')->name('ocupaciones.listar');

Route::get('estadosciviles/listar', 'EstadoCivilController@listar')->name('estadosciviles.listar');