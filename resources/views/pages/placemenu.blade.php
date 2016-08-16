@extends('layouts/default_min')

@section('content')
<div style="z-index: 2;">
    <div class="simpleCart_shelfItem">
     
        <div class="row">
            <div class="col-md-3">
                <section class="card" style="margin-top:90px;">
                    <h5 class="item_name">Ангилал:</h5>
                    <ul class="list-group">
                        @foreach($placeMenus as $menu)
                        <li class="list-group-item">{!! link_to_route('place_menu_path', $menu->name, $menu->id)!!}</li>
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
                                    <section class="col-md-4 col-sm-6">
                                        <div class="product-card store-card">
                                            <div class="company-logo">
                                                <a href="{{ route('place_path', $company->url ) }}"><img src="/assets/stores/logo/{{$company->logo}}"></a></div>
                                            <h4 class="store-title">{{$company->name}}</h4>
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
                                <h4>{{$type->name}}</h4>                          
                                    @foreach($type->places->chunk(3) as $fourtype)
                                        <div class="row">
                                        @foreach($fourtype as $company)
                                        <section class="col-md-4 col-sm-6">
                                            <div class="product-card store-card">

                                                <div class="company-logo">
                                                    <a href="{{ route('place_path', $company->url ) }}"><img src="/assets/stores/logo/{{$company->logo}}"></a></div>
                                                <h4 class="store-title">{{$company->name}}</h4>
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
                                @foreach($placeMenu->placeTypes as $type)
                                <div class="menu-list">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>{{$type->name}}</h4>
                                                
                                            </div>
                                        </div>
                                        @foreach($type->places->chunk(3) as $fourtype)
                                            <div class="row">
                                            @foreach($fourtype as $company)
                                            <section class="col-md-4 col-sm-6">
                                                <div class="product-card store-card">

                                                    <div class="company-logo">
                                                        <a href="{{ route('place_path', $company->url ) }}"><img src="/assets/stores/logo/{{$company->logo}}"></a></div>
                                                    <h4 class="store-title">{{$company->name}}</h4>
                                                    <h5>{!! link_to_route('place_path', $company->shorten(), $company->url)!!}</h5>
                                                </div>                                            
                                            </section>
                                            @endforeach
                                            </div>
                                        @endforeach                                           
                                    </div>
                                </div>
                                @endforeach                                 
                            @endif
                            </div>
                            
                            @if($AZ)
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