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

Route::get('/', function () {
    return redirect('gastos/create');
});
Route::group([ 'middleware' => ['auth', 'NumeroDeUsuarios'] ], function(){
	Route::resource('gastos', 'GastosController', ['except' => ['index']]);
	Route::get('gastos/{ano?}/{mes?}','GastosController@index')
	->where('ano', '\d{4}')
	->where('mes', '\d{2}');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);