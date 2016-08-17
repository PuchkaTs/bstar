@extends('layouts/default_min')

@section('content')
<div style="z-index: 2;">
    <div class="simpleCart_shelfItem">
        <div class="row">
        <div class="placeholder100">
            <div class="col-md-8 col-lg-6 col-md-offset-3">
                <header>
                    <h3>{{$menuName}}</h3>
                </header>
            </div>
        </div>           
            <div class="col-md-3">
                <section class="card">
                    <h5 class="item_name">Ангилал:</h5>
                    <ul class="list-group">
                        @foreach($companyType->companySubTypes as $type)
                        <li class="list-group-item">{!! link_to_route('companySubType_path', $type->name, $type->id)!!}</li>
                        @endforeach     
                    </ul>                                                                                   
                </section>
            </div>   
            <div class="col-md-9">   
                <div class="row">
                        <div class="menu-list-container">
                        @include('layouts.partials.topbanner')

                            <div class="menu-list">
                                <div class="menu-list">
                                @foreach($companySubType->companies->chunk(3) as $fourtype)
                                    <div class="row">
                                    @foreach($fourtype as $company)
                                    <section class="col-md-4 col-sm-6">
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