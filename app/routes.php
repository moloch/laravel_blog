<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	$auth_token = Cookie::get('auth_token');
	$session_token = Session::get('auth_token');
	$isAuth = ($auth_token!= null and $auth_token == $session_token);
	return View::make('homepage')->with('isAuth',$isAuth);
});


// Registration form page
Route::controller('register','RegistrationController');

Route::controller('login','LoginController');

