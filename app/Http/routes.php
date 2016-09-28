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

Route::get('/prueba', function () {
    return 'hola desde rutas php';
});




Route::get('name/{nombre}','PruebaController@nombre');
Route::resource('movie','MovieController');


Route::get('controlador','PruebaController@index');


Route::get('/nombre/{nombre}', function ($nombre) {
    return 'hola ni mi nombre es '.$nombre;
});

Route::get('/edad/{edad?}', function ($edad=20) {
    return 'hola ni mi edad es '.$edad;
});



Route::get('/', 'FrontController@index');
Route::get('/contacto', 'FrontController@contacto');
Route::get('/reviews', 'FrontController@reviews');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);



Route::resource('usuario','UsuarioController');