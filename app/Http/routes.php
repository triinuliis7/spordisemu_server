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

/* -- USERS -- */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users', function () {
	return view('users');
});

Route::post('/users', function () {
	return view('users');
});

Route::get('/users/{username}', function ($username) {	
	return view('users')->with('username', $username);
});

/* -- PROFILES -- */

Route::get('/profiles/{user_id}', function($user_id) {
	return view('profiles')->with('user_id', $user_id);
});

Route::post('/profiles', function() {
	return view('profiles');
});

/* -- SPORTS -- */

Route::get('/sports/{user_id}', function($user_id) {
	return view('sports')->with('user_id', $user_id);
});

Route::post('/sports', function() {
	return view('sports');
});

/* -- RATINGS -- */

Route::get('/ratings/{user_id}', function($user_id) {
	return view('ratings')->with('user_id', $user_id);
});

Route::post('/ratings', function() {
	return view('ratings');
});