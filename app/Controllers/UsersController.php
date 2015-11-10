<?php 

class NerdController extends \BaseController {

	public function index()
		{
			// get all the users
			$users = User::all();

			// load the view and pass the nerds
			return View::make('users.index')
				->with('users', $users);
		}
		
}