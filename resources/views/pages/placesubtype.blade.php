@extends('layouts/default_min')

@section('content')
<div style="z-index: 2;">
    <div class="simpleCart_shelfItem">
        <div class="row">
            <div class="col-md-3">
                <section class="card" style="margin-top:90px;">
                    <h5 class="item_name">Ангилал:</h5>
                    <ul class="list-group">
                        @foreach($placeType->placeSubTypes as $type)
                        <li class="list-group-item">{{$type->name}}</li>
                        @endforeach     
                    </ul>                                                                                   
                </section>
            </div>   
            <div class="col-md-9">   
                <div class="row">
                        <div class="menu-list-container">
                        <h1>{{$menuName}}</h1>
                        @include('layouts.partials.topbanner')

                            <div class="menu-list">
                                <div class="menu-list">
                                @foreach($placeSubType->places->chunk(3) as $fourtype)
                                    <div class="row">
                                    @foreach($fourtype as $company)
                                    <section class="col-md-4 col-xs-6">
                                        <div class="product-card">
                                            <div class="company-logo">
                                                <a href="{{ route('place_path', $company->url ) }}"><img src="/assets/stores/logo/{{$company->logo}}"></a></div>
                                            <h3>{{$company->name}}</h3>
                                            <h5>{!! link_to_route('place_path', $company->shorten(), $company->url)!!}</h5>
                                        </div>
                                    </section>
                                    @endforeach
                                    </div>
                                @endforeach
                                </div>
                            </div>
                            @include('layouts.partials.middlebanner')
                            @include('layouts.partials.reklam')
                            @include('layouts.partials.bottombanner')                                
                        </div>
                    </div>
            </div>
        </div>
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