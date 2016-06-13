@extends('layouts/default_min')

@section('content')
<div style="z-index: 2;">
    <div class="simpleCart_shelfItem">
     
        <div class="row">
            <div class="col-md-3">
                <section class="card" style="margin-top:90px;">
                    <h5 class="item_name">Ангилал:</h5>
                    <ul class="list-group">
                        @foreach($productMenu->productTypes as $type)
                        <li class="list-group-item">{!!link_to_route('type_path', $type->name, $type->id)!!}</li>
                        @endforeach     
                    </ul>                                                                                   
                </section>
            </div>   

            <div class="col-md-9">   
                <div class="row" style="background-color: white;">
                        <div class="menu-list-container">
                        <h1>{{$menuName}}</h1>
                            <div class="menu-list">
                            @foreach($productMenu->productTypes->chunk(4) as $fourtype)
                                <div class="row">
                                @foreach($fourtype as $type)
                                <section class="col-md-3 product-card">
                                        <h3>{{$type->name}}</h3>
                                        @foreach($type->subtypes as $subtype)
                                            <h5>{!! link_to_route('subtype_path', $subtype->name, $subtype->id)!!}</h5>

                                        @endforeach
                                </section>
                                @endforeach
                                </div>
                            @endforeach
                            </div>
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