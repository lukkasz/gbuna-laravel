@extends('layouts.main')
	
@section('content')
	<div class="container">

		<h2 class="margin-top">{{ $user->username }}</h2>
		{{ Form::model($user, array('route' =>  array('profile.update', $user->username),  'files'=>'true', 'method'=>'PUT')) }}

			<div class="form-group">
				{{ Form::label('phone', 'Telefon:') }}
				{{ Form::text('phone',null, array('class' => 'form-control')) }}
			</div>
				
			<div class="form-group">
				{{ Form::label('email', 'Email:') }}
				{{ Form::email('email', null, array('class' => 'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('cite', 'Citat: ')}}
				{{ Form::textarea('cite', null, array('class' => 'form-control'))}}
			</div>

			<div class="form-group">
				{{ Form::submit('Spremi', array('class' => 'btn btn-success')) }}
				{{ link_to('/admin', 'Odustani', array('class' => 'btn btn-danger'))}}
			</div>

		
		{{ Form::close() }}

	</div>
@stop