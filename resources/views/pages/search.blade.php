@extends('layouts/default_min')

@section('content')
<div style="z-index: 2;">
    <div class="simpleCart_shelfItem">
        <h1>{{$title}}</h1>  

        @include('layouts.partials.topbanner')
            @foreach($products->chunk(4) as $items)
                <div class="row product-list">
                @foreach($items as $product)
                    @include('layouts.partials.product-card2')
                @endforeach
                </div>
            @endforeach
                <div class="textcenter">
                {!! $products->links() !!}                                
                </div>                            
            @include('layouts.partials.middlebanner')
            @include('layouts.partials.reklam')
            @include('layouts.partials.bottombanner')
    </div>
</div>

<div class="placeholder50"></div>
@stop

@section('script')
  <script>
    $("#ex2").slider({});  

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