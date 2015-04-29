<?php

class PhotoController extends \BaseController {

	public function __construct() 
	{
		$this->beforeFilter('csrf', array('on' => array('post', 'put') ));
		$this->beforeFilter('auth', array('except' => 'destroy' ));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$photos = Photo::all();
		return View::make('admin.index')->with('photos', $photos);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//return Input::file('image')->getClientOriginalName();
		/* validation */
		// build input for validation
		$input = array(
			'name' 				=> Input::get('name'),
			'description' => Input::get('description'),
			'image' 			=> Input::file('image')
		);
		// define rules
		$rules = array(
			'name' 					=> array('required', 'unique:photos'),
			'description' 	=> array('required'),
			'image' 				=> array('required', 'image')
		);

		// Custom messages
		$messages = array(
			'required'	=> 'Ovo polje je obavezno',
			'image'			=> 'Datoteka mora biti jpg/jpeg/bmp/png',
			'unique'		=> 'Datoteka sa ovim imenom postoji'
		);

		// pass input to validator
		$validator = Validator::make($input, $rules, $messages);

		//test if input is valid

		if( $validator->fails() ) {
			return Redirect::route('admin.create')->withErrors($validator)->withInput();
		}

		//echo base_path() ;
		$img_name 		= Input::get('name');
		$slug 				= Helpers::seoURL($img_name);
		$description 	= Input::get('description');
		$category 		= Input::get('category');
		$file 				= Input::file('image');
		$extension 		= Input::file('image')->getClientOriginalExtension();
		$new_name 		= $slug.'.'.$extension;

		if (!Input::get('sold')) {
			$sold = 0;	
		} else {
			$sold = 1;
		}

		$photo = new Photo();
		$photo->name 				= $img_name;
		$photo->slug 				= $slug;
		$photo->extension 	= $extension;
		$photo->description = $description;
		$photo->category 		= $category;
		$photo->sold 				= $sold;
		$photo->save();

		$file->move(base_path() . '/public/images/fotografije/', $new_name);
		return Redirect::route('admin.index')->withMessage('Datoteka je dodana');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		//$photo = Photo::findOrFail($id);
		$photo = Photo::where('slug', '=', $slug)->firstOrFail();
		return View::make('admin.show')->withPhoto($photo);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// $photo = Photo::where('slug', '=', $slug)->firstOrFail();
		// return View::make('admin.edit')->withPhoto($photo);
		$photo = Photo::findOrFail($id);
		return View::make('admin.edit')->withPhoto($photo);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array(
			'name' => Input::get('name'),
			'description' => Input::get('description'),
			// 'image' => Input::file('image')
		);
		// define rules
		$rules = array(
			'name' 				=> array('required'),
			'description' 		=> array('required'),
			// 'image' 				=> array('required', 'image')
		);

		// Custom messages
		$messages = array(
			'required'	=> 'Ovo polje je obavezno',
			'image'			=> 'Datoteka mora biti jpg/jpeg/bmp/png',
			// 'unique'		=> 'Datoteka sa ovim imenom postoji'
		);

		// pass input to validator
		$validator = Validator::make($input, $rules, $messages);

		//test if input is valid

		if( $validator->fails() ) {
			return Redirect::route('admin.edit', $id)->withErrors($validator)->withInput();
		}

		$img_name 		= Input::get('name');
		$slug 			= Helpers::seoURL($img_name);
		$description 	= Input::get('description');
		$category 		= Input::get('category');

		if (!Input::get('sold')) {
			$sold = 0;	
		} else {
			$sold = 1;
		}

		$photo = Photo::findOrFail($id);

		if ($photo->name == $img_name)
		{
			$photo->description = $description;
			$photo->sold = $sold;
			$photo->category = $category;
			$photo->update();
			return Redirect::route('admin.index')->withMessage('Uspješno uređeno');
		} 
		else 
		{
			// get image old name
			$image_old = public_path() . '/images/fotografije/' . $photo->slug . '.' . $photo->extension;
			$photo->name = $img_name;
			$photo->slug = $slug;
			// get image new name
			$image_new = public_path() . '/images/fotografije/' . $photo->slug . '.' . $photo->extension;
			$photo->description = $description;
			$photo->sold = $sold;
			$photo->category = $category;
			// rename image
			File::move($image_old, $image_new);
			$photo->update();
			return Redirect::route('admin.index')->withMessage('Uspješno uređeno');

		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$photo = Photo::findOrFail($id);
		//$image_to_delete = public_path() . '/images/fotografije/' . $photo->slug . '.' . $photo->extension; 
		File::delete(public_path() . '/images/fotografije/' . $photo->slug . '.' . $photo->extension);
		$photo->delete();
		return Redirect::route('admin.index')->withMessage('Uspješno pobrisano');
	}

}
