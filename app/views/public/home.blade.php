@extends('layouts.main')
	

@section('content')

	<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-md-offset-1">
            <div class="image-wrap">
              <img class="img-responsive img-circle" src="images/profile.png">  
            </div>
          </div> 
          <div class="col-md-5">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2 class="panel-title text-center">Kontakt</h2>
              </div>
              <div class="panel-body">
                <address>
                  <p class="text-center">email: <strong><a href="mailto:#">{{ $user->email }}</a></strong></p>
                  <hr>
                  <p class="text-center">telefon: <strong><a href="tel:#">{{ $user->phone }}</a></strong></p>
                </address>
              </div>
            </div>
            <div class="btn-group btn-group-lg" role="group" aria-label="...">
              {{ link_to('/galerija/slike', 'Umjetničke slike', $attributes=array('class'=>'btn btn-default btn-galerija')) }}
              {{ link_to('/galerija/fotografije', 'Fotografije', $attributes=array('class'=>'btn btn-default btn-galerija'))}}
            </div> <!-- end .btn-group  -->
        </div> 
        </div> <!-- end .row -->
      </div>
    </div> <!-- end jumbotron -->

    <hr class="container">

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-6 col-md-offset-1">
          
          <div id="slider" class="carousel slide" data-ride="carousel">
          
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <?php $i = 0 ?>
              @foreach ($slides as $index => $slide)
                <li data-target="#slider" data-slide-to="{{ $i }}" class="@if ($index == 0) {{ 'active' }} @endif"</li>
                <?php $i++ ?>
              @endforeach
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              @foreach ($slides as $index => $slide)
                <div class="item @if ($index == 0) {{ 'active' }} @endif">
                  <img src="{{ asset( 'images/fotografije/' . $slide->slug . '.' . $slide->extension) }}" alt="{{ $slide->name}}">
                </div>
              @endforeach
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#slider" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#slider" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

        </div>
        <div class="col-md-4 col-md-offset-1">
          <blockquote>
            <p>{{ $user->cite }}</p>
          </blockquote>
       </div>
      </div> <!-- end .row -->
    </div> <!-- /.container -->
@stop