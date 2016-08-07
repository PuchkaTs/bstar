@extends('layouts/default_min')
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/flexslider/flexslider.css">
@stop
@section('body')
<div style="z-index: 2;">
    <div class="" style="background-color: white;">
        <div class="container">
    <div class="company_header">
        <div class="company_cover">
            @if($company->cover)
                {!! Html::image('assets/stores/cover/' . $company->cover, null, ['class' => 'center_cover']) !!}
            @endif()
        </div>
    </div>        
        <h1>{{$company->name}}</h1>
            <div class="row">
                <div class="col-md-12">
                    <article class="justify">{!! $company->about!!}</article>
                </div>
            </div>
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
            <div class="textcenter">
            {!! $products->links() !!}                                
            </div> 

                    <div class="placeholder50"></div>
                     <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            @if($company->images()->count())
                                <div id="slider" class="flexslider">
                                    <ul class="slides">
                                        @foreach($company->images()->orderBy('position', 'asc')->get() as $image)
                                        <li>
                                            {!! Html::image("/assets/stores/$image->image") !!}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                 <div id="carousel" class="flexslider">
                                    <ul class="slides">
                                        @foreach($company->images()->orderBy('position', 'asc')->get() as $image)
                                        <li>
                                            {!! Html::image("/assets/stores/100x100/$image->image") !!}
                                        </li>
                                        @endforeach
                                    </ul>
                                 </div>
                            @endif()                             
                        </div>
                     </div>                                                           
                            @include('layouts.partials.middlebanner')
                            @include('layouts.partials.bottombanner')            
        </div>
    </div>
</div>

<div class="placeholder50"></div>
@stop

@section('script')
<script src="/js/flexslider/jquery.flexslider-min.js"></script>
<script>

$(window).load(function() {
  // The slider being synced must be initialized first
  $('#carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 100,
    itemMargin: 5,
    asNavFor: '#slider'
  });

  $('#slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#carousel"
  });
});
</script>

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