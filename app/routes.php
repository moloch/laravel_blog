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
	$email = Session::get($auth_token, null);
	$isAuth = ($auth_token!= null and $email != null);
	$posts = Post::all();
	$params = array('isAuth' => $isAuth, 'email' => $email, 'posts' => $posts) ;
	return View::make('homepage',$params);
});


// Registration form page
Route::controller('register','RegistrationController');

Route::controller('login','LoginController');

Route::controller('post/{id}','PostController');

Route::controller('delete/{id}','DeleteController');

Route::controller('new','NewController');

