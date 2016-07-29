@extends('layouts/default_min')

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
    <h1 class="">{{$place->name}}</h1>    
    <div class="row">
                <div class="col-md-12">
                    <article>
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