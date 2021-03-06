@extends('layouts.main')
	
@section('content')
	<div class="container">
      <div class="gallery-wrap">
        <h1>Uređivanje fotografije/slike</h1>
        <hr>
        <div class="thumbnail">
    		<img class="img-responsive" src="{{ asset( 'images/fotografije/' . $photo->slug . '.' . $photo->extension) }}" alt="">
    	</div>
        {{ Form::model($photo, array('route' =>  array('admin.update', $photo->id),  'files'=>'true', 'method'=>'PUT')) }}
		
		{{-- 	<div class="form-group">
            {{ Form::label('Odaberi sliku/fotografiju')}}            
            {{ Form::file('image') }}
            {{ $errors->first('image', '<p class="alert alert-danger">:message</p>') }}
          </div> --}}
          <div class="form-group">
            {{ Form::label('category', 'Kategorija') }}
            {{ Form::select('category', array( 'fotografije' => 'Fotografije', 'slike' => 'Umjetničke Slike' ), null, array('class'=>'form-control') ) }}
          </div>
          <div class="checkbox">
            <!---->
            <label>
              {{ Form::checkbox('sold') }}
              u vlasništvu  
            </label>
          </div>
          <hr>
          <div class="form-group">
            {{ Form::label('name', 'Naziv slike') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
              {{ $errors->first('name', '<p class="alert alert-danger">:message</p>') }}
          </div>
          <div class="form-group">
            {{ Form::label('description', 'Opis') }}
            {{ Form::text('description', null, array('class' => 'form-control')) }}
            {{ $errors->first('description', '<p class="alert alert-danger">:message</p>') }}
          </div>
                    
          <div class="form-group">
            {{ Form::submit('Uredi', array('class' => 'btn btn-default btn-block btn-galerija')) }}
          </div>

        {{ Form::close() }}

      </div> <!-- /.gallery-wrap -->
    </div>
@stop

@section('fancybox')
	<!-- Add fancyBox -->
    {{ HTML::style('js/fancybox/source/jquery.fancybox.css?v=2.1.5') }}
    {{ HTML::script('js/fancybox/source/jquery.fancybox.pack.js?v=2.1.5') }}
    {{ HTML::script('js/main.js') }}
    
@stop
