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

/*Route::get('inicio', function () {
    return view('welcome');
});
*/
/*
Route::get('auth/login', [
	'uses' => 'Auth\AuthController@getLogin',
	'as'   => 'login'
	]);
*/
/*
Route::post('auth/login', 'Auth\AuthController@postLogin');
*/
/*
Route::get('auth/logout', [
	'uses' => 'Auth\AuthController@getLogout',
	'as'   => 'logout'
	]);
*/

/*Route::get('usuarios/', [
	'uses' => 'UsuariosController@index', 
	'as' => 'usuarios.index'
	]);
	*/

Route::get('pdf', array(
		'uses' => 'UsuariosController@getPDFAllUsers',
		'as' => 'pdfAllUsers'
	));

Route::get('excel', array(
		'uses' => 'UsuariosController@getExcelAllUsers',
		'as' => 'excelAllUsers'
	));

Route::get('login', array(
		'uses' => 'LoginController@getLogin',
		'as'   => 'login'
	));

Route::get('logout', array(
		'uses' => 'LoginController@getLogout', 
		'as' => 'logout'
	));

Route::get('inicio', array(
		'uses' => 'LoginController@getInicio',
		'as' => 'inicio'
	));

Route::resource('auth', 'LoginController');

Route::resource('usuarios', 'UsuariosController');

/*
	Event::listen('illuminate.query', function($query){
		var_dump($query);
	});
*/