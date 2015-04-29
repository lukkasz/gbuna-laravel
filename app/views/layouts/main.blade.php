<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Latest compiled and minified CSS -->
    {{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css') }}
    {{ HTML::style('http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic,900italic') }}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <title>GB una - galerija</title>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/">
                <h1>GB <span>una</span></h1>
                <h5 class="text-center">galerija</h5>
              </a>
            </div> <!-- end .navbar-header -->   
          </div> <!-- end .col-md-6 -->
          <div class="col-md-6">
            <div id="navbar" class="navbar-collapse collapse navbar-button-group">
              <div class="navbar-right">
                <!-- <button type="button" class="btn btn-success navbar-btn">Button 1</button>
                <button type="button" class="btn btn-default navbar-btn">Button 2</button> -->
                <div class="btn-group navbar-btn" role="group" aria-label="...">
                   {{ link_to('/', 'Početna', $attributes=array('class'=>'btn btn-default btn-galerija btn-galerija-inverse btn-galerija-nav'))}}
                  {{ link_to('/galerija/slike', 'Umjetničke slike', $attributes=array('class'=>'btn btn-default btn-galerija btn-galerija-inverse btn-galerija-nav'))}}
                  {{ link_to('/galerija/fotografije', 'Fotografije', $attributes=array('class'=>'btn btn-default btn-galerija btn-galerija-inverse btn-galerija-nav'))}}
                </div> <!-- end .btn-group  -->
              </div>
            </div><!--/.navbar-collapse -->
          </div>
        </div> <!-- end .row -->
      </div> <!-- end .container -->
      @if (Auth::check())
            <div class="admin-area ">
              <div class="container">
                {{ link_to('/admin', 'Administracija')}}
                <span> > </span>
                {{ link_to('/profile/gbuna/edit', 'Uredi profil')}}
                <span>| </span>
                {{ link_to_route('admin.create', 'Dodaj novu sliku')}}
                <div class="pull-right">
                  {{ link_to('/logout', 'Odjava')}}
                </div>
              </div>
            </div>
        @endif
    </div>

    @yield('content')

    <hr class="container">
    <div class="container">
      <footer>
        <p class="text-center">&copy; GB una 2015</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js') }}
    {{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js') }}
    
    @yield('scripts')
  </body>
</html>
