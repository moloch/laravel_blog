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

Route::get('/', 'HomeController@showWelcome');

Route::get('register', 'RegistrationController@showRegistrationForm');

Route::post('register', 'RegistrationController@submitRegistrationForm');

Route::get('login', 'LoginController@showLoginForm');

Route::post('login', 'LoginController@login');

Route::get('{user.id}/new_post', 'PostController@showNewPostForm');

Route::post('new_post', 'PostController@addPost');

Route::get('{user.id}/posts', 'PostController@viewPosts');

Route::get('login', function()
{
	$encrypted = Crypt::encrypt('secret');
	return $encrypted;
});

