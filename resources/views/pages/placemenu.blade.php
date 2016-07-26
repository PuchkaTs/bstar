@extends('layouts/default_min')

@section('content')
<div style="z-index: 2;">
    <div class="simpleCart_shelfItem">
     
        <div class="row">
            <div class="col-md-3">
                <section class="card" style="margin-top:90px;">
                    <h5 class="item_name">Ангилал:</h5>
                    <ul class="list-group">
                        @foreach($placeMenu->placeTypes as $type)
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
                            @if($placeMenu->deep == 1)
                                <div class="menu-list">
                                @foreach($companies->chunk(3) as $fourtype)
                                    <div class="row">
                                    @foreach($fourtype as $company)
                                    <section class="col-md-4 col-xs-6">
                                        <div class="product-card store-card">
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
                            @endif
                            @if($placeMenu->deep == 2)
                                <div class="menu-list">
                                @foreach($placeMenu->placeTypes as $type)                                
                                    @foreach($type->places->chunk(3) as $fourtype)
                                        <div class="row">
                                        @foreach($fourtype as $company)
                                        <section class="col-md-4 col-xs-6">
                                            <div class="product-card store-card">

                                                <div class="company-logo">
                                                    <a href="{{ route('place_path', $company->url ) }}"><img src="/assets/stores/logo/{{$company->logo}}"></a></div>
                                                <h3>{{$company->name}}</h3>
                                                <h5>{!! link_to_route('place_path', $company->shorten(), $company->url)!!}</h5>
                                            </div>                                            
                                        </section>
                                        @endforeach
                                        </div>
                                    @endforeach
                                @endforeach
                                </div>
                            @endif                            
                            @if($placeMenu->deep > 2)
                                @foreach($placeMenu->placeTypes->chunk(3) as $fourtype)
                                    <div class="row">
                                    @foreach($fourtype as $type)
                                    <section class="col-md-4 col-xs-6">
                                        <div class="product-card">

                                            <h3>{{$type->name}}</h3>
                                            @foreach($type->places as $place)

                                                <h5>{!! link_to_route('place_path', $place->name, $place->url)!!}</h5>

                                            @endforeach
                                        </div>                                            

                                    </section>
                                    @endforeach
                                    </div>
                                @endforeach
                            @endif
                            </div>
                            @if($paginate)
                                <div class="textcenter">
                                {!! $companies->links() !!}                                
                                </div>  
                            @endif                            
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
      simpleCart({
        checkout: {
          type: "SendForm",
          email: "you@yours.com"
        },
        cartStyle : "div"
      });
  </script>
@stop