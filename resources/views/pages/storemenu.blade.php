@extends('layouts/default_min')

@section('content')
<div style="z-index: 2;">
    <div class="simpleCart_shelfItem">
     
        <div class="row">
        <div class="placeholder100 hidden-xs">
            <div class="col-md-8 col-lg-6 col-md-offset-3">
                <header>
                    <h3>{{$menuName}}</h3>
                </header>
            </div>
        </div> 
        <div class="visible-xs">
            <div class="col-md-8 col-lg-6 col-md-offset-3">
                <header>
                    <h4 class="visible-xs">{{$menuName}}</h4>  
                </header>
            </div>
        </div>         
     
            <div class="col-md-3">
                <section class="card">
                    <h5 class="item_name">Ангилал:</h5>
                    <ul class="list-group">
                        @foreach($companyMenus as $menu)
                        <li class="list-group-item">{!! link_to_route('company_menu_path', $menu->name, $menu->id)!!}</li>
                        @endforeach     
                    </ul>                                                                                   
                </section>
            </div>   

            <div class="col-md-9">   
                <div class="row">
                    <div class="menu-list-container">
                        @include('layouts.partials.topbanner')

                            <div class="menu-list">
                            @if($companyMenu->deep == 1)
                                <div class="menu-list">
                                <div class="row">
                                @foreach($companies->chunk(3) as $fourtype)
                                    @foreach($fourtype as $company)
                                    <section class="col-md-4 col-sm-6">
                                        <div class="product-card store-card">
                                            <div class="company-logo">
                                                <a href="{{ route('store_path', $company->url ) }}"><img src="/assets/stores/logo/{{$company->logo}}"></a></div>
                                            <h4 class="store-title">{{$company->name}}</h4>
                                            <h5>{!! link_to_route('store_path', $company->shorten(), $company->url)!!}</h5>
                                        </div>                                            
                                    </section>
                                    @endforeach
                                @endforeach                                    
                                </div>

                                </div>
                            @endif
                            @if($companyMenu->deep == 2)
                                <div class="menu-list">
                                @foreach($companyMenu->companyTypes as $type)   
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4>{{$type->name}}</h4>                         
                                    </div>
                                </div> 
                                <div class="row">
                                    @foreach($type->companies->chunk(3) as $fourtype)
                                        @foreach($fourtype as $company)
                                        <section class="col-md-4 col-sm-6">
                                            <div class="product-card store-card">

                                                <div class="company-logo">
                                                    <a href="{{ route('store_path', $company->url ) }}"><img src="/assets/stores/logo/{{$company->logo}}"></a></div>
                                                <h4 class="store-title">{{$company->name}}</h4>
                                                <h5>{!! link_to_route('store_path', $company->shorten(), $company->url)!!}</h5>
                                            </div>                                            
                                        </section>
                                        @endforeach
                                    @endforeach
                                @endforeach                                    
                                </div>                                                             

                                </div>
                            @endif                            
                            @if($companyMenu->deep > 2)
                                @foreach($companyMenu->companyTypes as $type)
                                <div class="menu-list">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>{{$type->name}}</h4>                                        
                                        </div>
                                    </div>
                                    <div class="row">
                                        @foreach($type->companies->chunk(3) as $fourtype)
                                            @foreach($fourtype as $company)
                                            <section class="col-md-4 col-sm-6">
                                                <div class="product-card store-card">

                                                    <div class="company-logo">
                                                        <a href="{{ route('store_path', $company->url ) }}"><img src="/assets/stores/logo/{{$company->logo}}"></a></div>
                                                    <h4 class="store-title">{{$company->name}}</h4>
                                                    <h5>{!! link_to_route('store_path', $company->shorten(), $company->url)!!}</h5>
                                                </div>                                            
                                            </section>
                                            @endforeach
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