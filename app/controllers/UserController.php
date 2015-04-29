<?php

/**
* 
*/
class UserController extends \BaseController 
{

	public function __construct()
	{
		$this->beforeFilter('auth', array('except' => 'destroy'));
	}

	public function edit($username = null)
	{
		$user = User::where('username', '=', 'gbuna')->firstOrFail();
		return View::make('user.edit')->withUser($user);
	}

	public function update($id)
	{
		$phone 	= Input::get('phone');
		$email 	= Input::get('email');
		$cite 	= Input::get('cite');

		$user = User::where('username', '=', 'gbuna')->firstOrFail();
		$user->phone 	= $phone;
		$user->email 	= $email;
		$user->cite 	= $cite;
		$user->update();
		return Redirect::action('PublicController@index');
	}

}