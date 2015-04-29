@extends('layouts.main')
	
@section('content')
	<div class="container margin-top">
	
		{{ Form::open(array('route' => 'sessions.store')) }}
			
			<div class="form-group">
				{{ Form::label('username', 'Username:') }}
				{{ Form::text('username',null, array('class' => 'form-control')) }}
			</div>
			
			<div class="form-group">
				{{ Form::label('password', 'Password:') }}
				{{ Form::password('password', array('class' => 'form-control')) }}
			</div>

			 <div class="form-group">
				{{ Form::submit('Login', array('class' => 'btn btn-default btn-block btn-galerija')) }}
			</div>

		{{ Form::close() }}
	
	</div>
@stop

@section('scripts')

 	{{ HTML::script('js/main.js') }}
    
@stop