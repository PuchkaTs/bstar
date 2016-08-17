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
                <section class="card" >
                    <h5 class="item_name">Ангилал:</h5>
                    <ul class="list-group">
                        @foreach($productTypes as $type)
                        <li class="list-group-item">{!!link_to_route('type_path', $type->name, $type->id)!!}</li>
                        @endforeach     
                    </ul>                                                                                   
                </section>
            </div>   

            <div class="col-md-9">   
                <div class="row">
                        <div class="menu-list-container">
                        @include('layouts.partials.topbanner')

                            <div class="menu-list">
                                <div class="row">
                                <section class="col-md-3">
                                    <div class="product-card">
                                        <h3>{{$typeName}}</h3>
                                        @foreach($productType->subTypes as $subtype)
                                            <h5>{!! link_to_route('subtype_path', $subtype->name, $subtype->id)!!}</h5>

                                        @endforeach                                        
                                    </div>
                                </section>                                    
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