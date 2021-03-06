<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




Route::get('/', 'FrontController@index');
Route::get('/contacto', 'FrontController@contacto');
Route::get('/reviews', 'FrontController@reviews');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


////agregar la ruta de crear tarea antes de definir el recurso
///Route::get('usuario/crearTarea', 'UsuarioController@crearTarea');

///calendario tareas
Route::get('calendarioTareas', 'TareaController@getCalendarioTareas');
Route::get('calendarioJsonTareas/', 'TareaController@getCalendarioJsonTareas');



Route::get('tarea/setearTareas/{id}/{idEstado}', ['as' => 'tarea.setear', 'uses' => 'TareaController@setearTareas']);
Route::get('tarea/cambiarEstadoTarea', 'TareaController@cambiarEstadoTarea');
Route::resource('tarea','TareaController');
Route::resource('usuario','UsuarioController');
//////////////////////////////////////////////////////////////
Route::resource('log','LogController');
Route::get('admin','FrontController@admin');
Route::get('logout','LogController@logout');

////////grupo tarea recursos
Route::resource('grupoTarea', 'GrupoTareaController');
////integrantes grupo recursos
	
///traer integrantes grupo ajax con jquery	a liminar o a agregar
Route::get('integrantesGrupoEliminar/{id}', 'IntegrantesGrupoController@getIntegrantesGrupoEliminar');
Route::get('integrantesGrupo/{id}', 'IntegrantesGrupoController@getIntegrantesGrupo');
Route::resource('integrantesGrupo', 'IntegrantesGrupoController');


////////seguimiento tareas
Route::get('seguimientoTarea/avanceTarea/{id}', 'SeguimientoTareaController@getAvanceTarea');	
Route::resource('seguimientoTarea', 'SeguimientoTareaController');

////aplazamiento tareas
////traer fecha final tarea
Route::get('aplazamientoTarea/fechaFinalTarea/{id}', 'AplazamientoTareaController@getFechaFinalTarea');	
Route::resource('aplazamientoTarea', 'AplazamientoTareaController');

///email 
Route::get('mail/enviarCorreo', 'MailController@enviarCorreo');	
Route::resource('mail', 'MailController');