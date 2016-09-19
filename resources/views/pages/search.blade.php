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
            @if(isset($stores))
                @foreach($stores->chunk(4) as $fourtype)   
                    <div class="row">
                    @foreach($fourtype as $company)
                    <section class="col-md-3 col-sm-6">
                        <div class="product-card store-card">
                            <div class="company-logo">
                                <a href="{{ route('store_path', $company->url ) }}"><img src="/assets/stores/logo/{{$company->logo}}"></a></div>
                            <h3>{{$company->name}}</h3>
                            <h5>{!! link_to_route('store_path', $company->shorten(), $company->url)!!}</h5>
                        </div>
                    </section>
                    @endforeach
                    </div>    
                @endforeach
            @endif
                                            
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