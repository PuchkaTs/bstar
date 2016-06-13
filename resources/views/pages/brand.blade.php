@extends('layouts/default_min')

@section('content')
<div style="z-index: 2;">
    <div class="simpleCart_shelfItem">
     
        <div class="row">
            <div class="col-md-3">
                <section class="card" style="margin-top:116px;">
                    <h5 class="item_name">Брэнд:</h5>
                    <ul class="list-group">
                        @foreach($brands as $brand)
                        <li class="list-group-item">{!!link_to_route('brand_path', $brand->name, $brand->id)!!}</li>
                        @endforeach
                    </ul>    
                </section>
            </div>   
            <div class="col-md-9">   
                <div class="row" style="background-color: white;">
                        <div class="container">
                        <h1>{{$brandName}}</h1>
                            <div class="row">
                                @foreach($products as $product)
                                    <div class="simpleCart_shelfItem col-md-3 col-xs-6 textcenter">
                                        <div class="product-card">                        
                                            <div>
                                                <div style="display:none" class="item_pageLink">{{route('product_path', $product->id)}}</div>
                                                <a href="{{route('product_path', $product->id)}}" class="item-thumb">{!! Html::image("assets/products/thumbs/$product->photo", '', ['class'=>'item_thumb'])!!}</a>                          
                                            </div>
                                            <div class="info">
                                                <div class="row">
                                                    <div class="rating">
                                                        <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                                    </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                                    </i><i class="price-text-color fa fa-star"></i>
                                                    </div>
                                                    <div class="price">
                                                        <h4 class="item_name">{{$product->name}}</h4>
                                                        <h5 class="price-text-color item_price">{{$product->price}}₮</h5>
                                                    </div>                             
                                                </div>
                                                <div class="separator clear-left">
                                                    <p class="small-text">{{ $product->shorten(100)}} {!! link_to_route('product_path', 'Дэлгэрэнгүй', $product->id, ['class' => 'more'])!!}</p>
                                                </div>
                                                <div class="clearfix">
                                                </div>
                                            </div>
                                            <div class="subbanner-title">
                                                <button type="button" class="btn btn-default btn-sm btn-block item_add"> <i class="fa fa-shopping-cart"></i>Сагсанд нэмэх</button>
                                            </div>
                                        </div>
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