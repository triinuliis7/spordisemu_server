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

/* -- PRACTICES -- */

Route::get('/profiles/{username}', function($username) {
	return view('profile')->with('username', $username);
});