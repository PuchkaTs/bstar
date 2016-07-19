@extends('layouts/default_min')

@section('content')
<div style="z-index: 2;">
    <div class="simpleCart_shelfItem">
     
        <div class="row">
            <div class="col-md-3">
                <section class="card" style="margin-top:90px;">
                    <h5 class="item_name">Ангилал:</h5>
                    <ul class="list-group">
                        @foreach($companyTypes as $type)
                            <li class="list-group-item"><a href="{{ route('store_type_path', $type->id) }}">{{$type->name}}</a>
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
                            @foreach($companyType->companies->chunk(4) as $fourtype)
                                <div class="row">
                                @foreach($fourtype as $company)
                                <section class="col-md-3 product-card">
                                        <div class="company-logo">
                                            <a href="{{ route('store_path', $company->url ) }}"><img src="/assets/stores/logo/{{$company->logo}}"></a></div>
                                        <h3>{{$company->name}}</h3>
                                        <h5>{!! link_to_route('store_path', $company->shorten(), $company->url)!!}</h5>
                                </section>
                                @endforeach
                                </div>
                            @endforeach
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