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

// Provincias Departamentos

Route::get('provincias/listar', 'ProvinciaController@listar')->name('provincias.listar');

Route::get('departamentos/departamentosprovincia/{provincia_id}', 'DepartamentoController@departamentosprovincia')->name('departamentos.departamentosprovincia');


// Administracion 

Route::get('administracion/{clase}/listar/{plural}', 'AdministracionController@listar')->name('administracion.clase.listar');

Route::post('administracion/agregar/{clase}', 'AdministracionController@agregar')->name('administracion.clase.agregar');

Route::get('administracion/cambiarestado/{clase}/{id}/', 'AdministracionController@cambiarestado')->name('administracion.clase.cambiarestado');

Route::get('administracion/quitar/{clase}/{id}/', 'AdministracionController@quitar')->name('administracion.clase.quitar');

Route::get('administracion/{clase}/buscar', 'AdministracionController@buscar')->name('administracion.clase.buscar');

Route::post('administracion/{clase}/filtar', 'AdministracionController@filtrar')->name('administracion.clase.filtrar');

Route::get('administracion/{clase}/resetearfiltrosclase', 'AdministracionController@resetearfiltrosclase')->name('administracion.clase.resetearfiltrosclase');



Route::get('administracion/pacientes/eliminados/listar', 'PacienteController@listar_eliminados')->name('pacientes.listar_eliminados');

Route::get('administracion/pacientes/eliminados/{id}/recuperar', 'PacienteController@recuperar_eliminado')->name('pacientes.recuperar_eliminado');



// Pacientes, ocupaciones, estados civiles, obras sociales

Route::get('/', 'PacienteController@index')->name('inicio');

Route::resource('pacientes', 'PacienteController');

Route::get('buscarpaciente', 'PacienteController@buscar')->name('buscarpaciente');

Route::post('pacientes/filtarpacientes', 'PacienteController@filtrar')->name('filtrarpacientes');

Route::get('resetearfiltrospacientes', 'PacienteController@resetearfiltrospacientes')->name('resetearfiltrospacientes');

Route::get('estadosciviles/listar', 'EstadoCivilController@listar')->name('estadosciviles.listar');

Route::get('ocupaciones/listar', 'OcupacionController@listar')->name('ocupaciones.listar');

Route::get('obrassociales/listar', 'ObraSocialController@listar')->name('obrassociales.listar');


// Historia Clinica 

Route::post('historiaclinica/{pacienteid}/agregar/{clase}', 'HistoriaClinicaController@agregar')->name('historiaclinica.clase.agregar');

Route::get('historiaclinica/{clase}/buscar', 'HistoriaClinicaController@buscar')->name('historiaclinica.clase.buscar');

Route::post('historiaclinica/{clase}/filtrar', 'HistoriaClinicaController@filtrar')->name('historiaclinica.clase.filtrar');

Route::get('historiaclinica/{pacienteid}/{clasepaciente}/quitar/{clase}/{id}/', 'HistoriaClinicaController@quitar')->name('historiaclinica.clase.quitar');



Route::post('medicamentospacientes/agregar', 'MedicamentoPacienteController@agregar')->name('medicamentospacientes.agregar');


Route::post('antecedentespatologicospacientes/agregar', 'AntecedentePatogolicoPacienteController@agregar')->name('antecedentespatologicospacientes.agregar');

