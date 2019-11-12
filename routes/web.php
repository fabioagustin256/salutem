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


// Administracion 

Route::get('administracion/listar/{clase}', 'AdministracionController@listar')->name('administracion.clase.listar');

Route::post('administracion/agregar/{clase}', 'AdministracionController@agregar')->name('administracion.clase.agregar');

Route::get('administracion/cambiarestado/{clase}/{id}/', 'AdministracionController@cambiarestado')->name('administracion.clase.cambiarestado');

Route::get('administracion/quitar/{clase}/{id}/', 'AdministracionController@quitar')->name('administracion.clase.quitar');


Route::get('administracion/personas/eliminados/listar', 'PersonaController@listar_eliminados')->name('personas.listar_eliminados');

Route::get('administracion/personas/eliminados/{id}/recuperar', 'PersonaController@recuperar_eliminado')->name('personas.recuperar_eliminado');



// Personas, ocupaciones

Route::get('/', 'PersonaController@index')->name('inicio');

Route::resource('personas', 'PersonaController');

Route::get('buscarpersona', 'PersonaController@buscar')->name('buscarpersona');

Route::post('personas/filtarpersonas', 'PersonaController@filtrar')->name('filtrarpersonas');

Route::get('resetearfiltrospersonas', 'PersonaController@resetearfiltrospersonas')->name('resetearfiltrospersonas');

Route::get('ocupaciones/listar', 'OcupacionController@listar')->name('ocupaciones.listar');

Route::get('estadosciviles/listar', 'EstadoCivilController@listar')->name('estadosciviles.listar');