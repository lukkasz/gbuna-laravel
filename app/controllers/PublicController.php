<?php

class PublicController extends \BaseController {

	/**
	 * Display a listing of Homepage.
	 *
	 * @return View with some user details and latest 3 phots added
	 */
	public function index()
	{
		$get_3_rows = DB::table('photos')
					->select('name', 'slug', 'extension')
					->where('category', '=', 'fotografije')
					->orderBy('id', 'desc')
					->take(3)
					->get();

		$user = User::where('username', '=', 'gbuna')->firstOrFail();
		return View::make('public.home')->withSlides($get_3_rows)->withUser($user);
	}


	/**
	 * Display a listing of the photos.
	 *
	 * @return View with pictures from database
	 */
	public function pictures()
	{
		$photos = DB::table('photos')
					->select('slug', 'name', 'description', 'extension')
					->where('category', '=', 'slike')
					->get();
		return View::make('public.gallery')->withPhotos($photos);
	}

	/**
	 * Display a listing of the photos.
	 *
	 * @return View with photos from database
	 */
	public function photos()
	{
		$photos = DB::table('photos')
					->select('slug', 'name', 'description', 'extension')
					->where('category', '=', 'fotografije')
					->get();
		return View::make('public.gallery')->withPhotos($photos);	
	}
}
