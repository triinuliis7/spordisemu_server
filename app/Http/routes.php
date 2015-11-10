<?php

	Route::get('/', function()
    {
        return View::make('home');
    });

    // about page (app/views/users.blade.php)
    Route::get('users', function()
    {
        return View::make('users');
    });	
	
	App::missing(function($exception)
    {

        // shows an error page (app/views/error.blade.php)
        // returns a page not found error
        return Response::view('error', array(), 404);
    });