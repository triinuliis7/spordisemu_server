<?php

	class UsersController extends Controller {
	
		public function __construct() {
			$this -> middleware('guest');
		}
		
		public function index() {
			return 'user';