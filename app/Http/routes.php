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


Route::get('controlador','PruebaController@index');


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

Route::resource('tarea','TareaController');
Route::resource('usuario','UsuarioController');
//////////////////////////////////////////////////////////////
Route::resource('log','LogController');
Route::get('admin','FrontController@admin');
Route::get('logout','LogController@logout');

////////grupo tarea recursos
Route::resource('grupoTarea', 'GrupoTareaController');
////integrantes grupo recursos
	
Route::resource('integrantesGrupo', 'IntegrantesGrupoController');



