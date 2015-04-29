
@extends('layouts.main')

@section('content')
	<div class="container">
		@if (Session::has('message'))
			<div class="alert alert-success alert-dismissible fixed-top" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					{{{ Session::get('message') }}}
			</div>
		@endif
		<table class="table table-condensed">
			<thead>
				<tr>
					<th>Slika</th>
					<th>Naziv slike</th>
					<th>SLUG</th>
					<th>Opis</th>
					<th>Akcija</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($photos as $photo)
			<tr>
				<td>
					<div class="table--image">
						<img class="img-responsive" src="{{ asset( 'images/fotografije/' . $photo->slug . '.' . $photo->extension) }}" alt="">
					</div>
				</td>
				<td>{{ $photo->name }}</td>
				<td>{{ $photo->slug }}</td>
				<td>{{ $photo->description }}</td>
				<td>
					<div class="btn-group">
						{{ link_to_route('admin.edit', 'Uredi', array($photo->id), array('class' =>'btn btn-galerija btn-galerija-inverse'))}}
                 	  	{{ Form::model($photo, array('route' => array('admin.destroy', $photo->id), 'method' => 'delete')) }}
                 	 		{{ Form::button('Obriši', array('type' => 'submit', 'class' => 'btn btn-default btn-galerija btn-galerija-inverse') ) }}
                 	 	{{ Form::close() }}
					</div>
				</td>
			</tr>
			@endforeach
			</tbody>
		</table>
		{{ link_to_route('admin.create', 'Dodaj novu sliku', null, array('class' => 'btn btn-galerija btn-block'))}}
	</div>
@stop

@section('scripts')

 	{{ HTML::script('js/main.js') }}
    
@stop