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

Route::group(['middleware' => 'guest'], function(){
	Route::get('/', function () {
    	return view('auth/login');
	});
	Route::resource('estudiante/registro', 'estudiante\EstudianteController');
});

//Antony
Route::group(['middleware' => ['auth','admin']], function(){
	Route::resource('/administrador/docente', 'Administrador\DocenteController');
	Route::resource('/administrador/materia', 'Administrador\MateriaController');
	Route::resource('/administrador/auxiliar', 'Administrador\AuxiliarController');
	Route::resource('/administrador/estudiante','Administrador\EstudianteController');

	Route::resource('/administrador/gestion', 'Administrador\GestionController');
	Route::get('/administrador/gestion/lista/{id}','Administrador\GestionController@listGestion');

	Route::get('/administrador/horario/laboratorios/labs/{id}','Administrador\HorarioController@listar');
	Route::get('/administrador/horario/{id}','Administrador\HorarioController@ocupado');
	Route::resource('/administrador/horario','Administrador\HorarioController');

	Route::get('/administrador/docente/{id}/destroy', 'Administrador\DocenteController@destroy');
	Route::get('/administrador/materia/{id}/destroy', 'Administrador\MateriaController@destroy');
	Route::get('/administrador/auxiliar/{id}/destroy', 'Administrador\AuxiliarController@destroy');
	Route::get('/administrador/gestion/{id}/destroy', 'Administrador\GestionController@destroy');
});



//Arturo
Route::group(['middleware' => ['auth','estudiante']], function(){


	Route::get('estudiante/inscripcion/listarMaterias','estudiante\InscripcionController@listarMaterias');
	Route::get('estudiante/inscripcion/{id}','estudiante\InscripcionController@listarDocentesDeLaMateria');
	Route::get('estudiante/inscripcion/{id}/{id2}','estudiante\InscripcionController@buscarGrupos');
	Route::resource('estudiante/inscripcion', 'estudiante\InscripcionController');

	Route::get('estudiante/inscripcion/sesionMateria/{idGrupo}/{idEstudiante}','estudiante\SesionMateriaController@listarSesiones');
	Route::get('estudiante/inscripcion/sesionMateria/practicaAuxiliar/{idg}/{idEstudiante}/{idins}/{idprac}/{i}','estudiante\SesionMateriaController@buscarPractica');
	Route::get('estudiante/inscripcion/sesionMateria/portafolio/{idg}/{idEstudiante}/{idins}/{idprac}','estudiante\SesionMateriaController@buscarPortafolio');
	Route::get('estudiante/inscripcion/sesionMateria/descargar/{id}/{archivo}', 'estudiante\SesionMateriaController@descargar');
Route::get('/estudiante/inscripcion/sesionMateria/descargar/{id}/{id1}/{i}/{archivo}', 'estudiante\SesionMateriaController@descargarPractica');
	
Route::get('/estudiante/inscripcion/sesionMateria/calificaciones/{id}/{id1}', 'estudiante\SesionMateriaController@listarCalificaciones');
	
	Route::resource('estudiante/inscripcion/sesionMateria', 'estudiante\SesionMateriaController');
});


//Clara
Route::group(['middleware' => ['auth','docente']], function(){
Route::get('docente/grupos/{id}','docente\DocenteController@listarGrupos');
	Route::get('docente/crearGrupo/{id}','docente\DocenteController@crearGrupo');
	Route::get('docente/agregarMateria/{id}','docente\DocenteController@agregarMateria');
	Route::get('/findDia','docente\DocenteController@findDia');
	Route::get('/findHoras','docente\DocenteController@findHoras');
	Route::get('/findAuxiliar','docente\DocenteController@findAuxiliar');
	Route::resource('docente','docente\DocenteController');
	
	Route::get('docente/registro/{id}','docente\RegistroAuxController@crearAuxiliar');
	Route::resource('docente/registro','docente\RegistroAuxController');

	Route::resource('docente/materias','docente\DocenteMateriaController');

	Route::get('docente/grupoLaboratorio/{id}/{archivo}/{i}', 'docente\PracticaGrupoController@descargar');
	Route::get('docente/grupoLaboratorio/{idM}/{id}','docente\PracticaGrupoController@mostrarGrupo');
	Route::get('docente/reporte/{id}','docente\PracticaGrupoController@reporte');
	Route::get('docente/grupo/{g}/{id}','docente\PracticaGrupoController@mostrarPortafolio');
	Route::get('docente/sesion/{glab}/{est}/{idPrac}','docente\PracticaGrupoController@mostrarSesion');
	
	Route::get('docente/nota/{id}','docente\PracticaGrupoController@editarNota');
	Route::get('docente/descargar/{id}/{archivo}', 'docente\PracticaGrupoController@descargarArchivoEstudiante');
	Route::resource('docente/grupoLaboratorio','docente\PracticaGrupoController');		
});

//Pablo
Route::group(['middleware' => ['auth','auxiliar']], function(){
	Route::resource('auxiliar/recursos','Auxiliar\AuxiliarController2');
	Route::resource('auxiliar/reportes','Auxiliar\AuxiliarControllerReporte');
	
	Route::resource('auxiliar/grupos','Auxiliar\AuxiliarController1');
  Route::resource('auxiliar','Auxiliar\AuxiliarControllerGrupos');
	Route::get('auxiliar/grupos/{idAux}/{idGrupo}', 'Auxiliar\AuxiliarController1@listarEstudiantes');

  //Route::resource('/recursos','Auxiliar\AuxiliarController2');
  Route::get('auxiliar/descargar/{id}/{archivo}', 'Auxiliar\AuxiliarController1@descargar');

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
