@extends('layouts/default_min')
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/flexslider/flexslider.css">
@stop

@section('body')
<div style="z-index: 2;">
    <div class="" style="background-color: white;">
        <div class="container">
    <div class="company_header">
        <div class="company_cover">
            @if($place->cover)
                {!! Html::image('assets/places/cover/' . $place->cover, null, ['class' => 'center_cover']) !!}
            @endif()
        </div>
    </div>
     <div class="row">
            @if($place->images()->count())
                <div id="slider" class="flexslider">
                    <ul class="slides">
                        @foreach($place->images()->orderBy('position', 'asc')->get() as $image)
                        <li style="margin: 5px;">
                            {!! Html::image("/assets/places/$image->image") !!}
                        </li>
                        @endforeach
                    </ul>
                </div>
            @endif() 
     </div>  
    <div class="placeholder50"></div>

    <h1 class="store-title">{{$place->name}}</h1>  

    <div class="row">
                <div class="col-md-12">
                    <article class="justify">
                        {!!$place->about!!}
                    </article>

                </div> 
    </div>
                            @include('layouts.partials.middlebanner')
                            @include('layouts.partials.bottombanner') 
    </div>
    </div>
</div>

<div class="placeholder50"></div>
@stop

@section('script')
<script src="/js/flexslider/jquery.flexslider-min.js"></script>
<script>

$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    animationLoop: false,
    itemWidth: 400,
    itemMargin: 5,
  });
});

</script>
  <script>
    simpleCart({
      checkout: {
        type: "SendForm",
        email: "you@yours.com",
        url: "/checkout",
        method: "GET" ,
        success: "success"
      },


    });

  </script>
@stop