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

Route::get('/', 'PublicController@index');
Route::get('/galerija/fotografije', 'PublicController@photos');
Route::get('/galerija/slike', 'PublicController@pictures');


Route::get('/login', 'SessionsController@create');
Route::get('/logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController', array('only' => array('create', 'store', 'destroy')));
Route::resource('admin', 'PhotoController');
Route::resource('profile', 'UserController', array('only' => array('edit', 'update')));

/* create user route */
// Route::get('/createUser', function()
// {
// 	User::create([
// 		'username' 	=> 'gbuna',
// 		'password' 	=> Hash::make('admin'),
// 		'email'			=> 'goga@example.com',
// 		'phone'			=> '+385 33 222 222',
// 		'cite'			=> 'lorem ipsum dollar site in nano dasn dasdnmas dasd da dasd dasd asdas d'
// 	]);

// 	return 'Done';

// });





