<?php

/**
* 
*/
class SessionsController extends \BaseController 
{
	
	public function create() 
	{
		if (Auth::check()) return Redirect::to('/admin');
		return View::make('sessions.create');
	}

	public function store()
	{
		if (Auth::attempt(Input::only('username', 'password')))
		{
			return Redirect::to('/admin');
		}

		return Redirect::to('/login');
	}

	public function destroy()
	{
		Auth::logout();

		return Redirect::to('/login');
	}

}