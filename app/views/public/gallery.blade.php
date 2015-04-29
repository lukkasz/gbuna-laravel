  @extends('layouts.main')
  
@section('content')
  <div class="container">
      <div class="gallery-wrap">
        <!-- row -->
        <div class="row">
        @foreach ($photos as $photo)
          <div class="col-md-3">
            <div class="image-wrap">
              <div class="thumbnail">
                <a class="fancybox" rel="gallery1" href="{{ asset('images/fotografije/' . $photo->slug . '.jpg') }}">
                  <img src="{{ asset( 'images/fotografije/' . $photo->slug . '.' . $photo->extension) }}" alt="">
                </a>
                <div class="caption">
                  <h3>{{{ $photo->name }}}</h3>
                  <p>{{{ $photo->description }}}</p>
                </div>
              </div> <!-- /.thumbnail -->
            </div> <!-- /.image-wrap -->
          </div> <!-- /.col-md-3 -->
         @endforeach
      </div> <!-- /.gallery-wrap -->
    </div>
@stop

@section('scripts')
  <!-- Add fancyBox -->
    {{ HTML::style('js/fancybox/source/jquery.fancybox.css?v=2.1.5') }}
    {{ HTML::script('js/fancybox/source/jquery.fancybox.pack.js?v=2.1.5') }}
    {{ HTML::script('js/app.js') }}
    
@stop
