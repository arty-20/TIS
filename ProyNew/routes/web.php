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
    return view('welcome');
});
//Antony
Route::resource('/administrador/docente', 'Administrador\DocenteController');
Route::resource('/administrador/materia', 'Administrador\MateriaController');
Route::resource('/administrador/auxiliar', 'Administrador\AuxiliarController');
Route::resource('/administrador/estudiante','Administrador\EstudianteController');

Route::resource('/administrador/gestion', 'Administrador\GestionController');
Route::get('/administrador/gestion/lista/{id}','Administrador\GestionController@listGestion');

Route::get('/administrador/horario/laboratorios/labs/{id}','Administrador\HorarioController@listar');
Route::get('/administrador/horario/{id}','Administrador\HorarioController@ocupado');
Route::resource('/administrador/horario','Administrador\HorarioController');

//Arturo
Route::resource('estudiante/registro', 'estudiante\EstudianteController');

Route::get('estudiante/inscripcion/listarMaterias','estudiante\InscripcionController@listarMaterias');
Route::get('estudiante/inscripcion/{id}','estudiante\InscripcionController@listarDocentesDeLaMateria');
Route::get('estudiante/inscripcion/{id}/{id2}','estudiante\InscripcionController@buscarGrupos');
Route::resource('estudiante/inscripcion', 'estudiante\InscripcionController');

Route::get('estudiante/inscripcion/sesionMateria/{idGrupo}/{idEstudiante}','estudiante\SesionMateriaController@listarSesiones');
Route::get('estudiante/inscripcion/sesionMateria/practicaAuxiliar/{idg}/{idEstudiante}/{idins}/{idprac}','estudiante\SesionMateriaController@buscarPractica');
Route::get('estudiante/inscripcion/sesionMateria/portafolio/{idg}/{idEstudiante}/{idins}/{idprac}','estudiante\SesionMateriaController@buscarPortafolio');
Route::get('estudiante/inscripcion/sesionMateria/descargar/{id}/{archivo}', 'estudiante\SesionMateriaController@descargar');
Route::resource('estudiante/inscripcion/sesionMateria', 'estudiante\SesionMateriaController');

//Clara
Route::get('docente/grupos/{id}/{id2}','docente\DocenteController@listarGrupos');
Route::get('docente/grupoLaboratorio/{id}','docente\DocenteController@mostrarGrupo');
Route::get('docente/grupoLaboratorio/listaEstudiantes/grupo_{id}','docente\DocenteController@listarEstudiantes');
Route::get('docente/crearGrupo','docente\DocenteController@crearGrupo');
Route::resource('docente/index','docente\DocenteController');

Route::get('docente/grupoLaboratorio/{id}','docente\PracticaGrupoController@mostrarGrupo');

Route::resource('docente/grupoLaboratorio','docente\PracticaGrupoController');

//Pablo
Route::resource('auxiliar','Auxiliar\AuxiliarController1');
Route::resource('auxiliar/grupo2','Auxiliar\AuxiliarController2');
