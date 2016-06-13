@extends('layouts/default_min')

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/flexslider/flexslider.css">
@stop

@section('content')
<div class="simpleCart_shelfItem">
 
    <div class="row">
        <div class="col-md-3">
            <section class="card" style="margin-top:116px;">
                <h5 class="item_name">{{ $productType->name }}</h5>
                <ul class="list-group">
                    @foreach($productSubTypes as $type)
                    <li class="list-group-item">{!!link_to_route('subtype_path', $type->name, $type->id)!!}</li>
                    @endforeach
                </ul>    
            </section>
        </div>   
        <div class="col-md-9">    
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12 gheader">
                        <header>
                            <h3 class="item_name">{{ $product->name }}</h3>
                            <h5>ID: {{sprintf('%06d', $product->id)}}
                                @if ($product->stars >= 1)
                                @if ($product->stars <= 5)
                                    <div class="rating">                    
                                        @for ($i = 0; $i < $product->stars; $i++)
                                            <i class="price-text-color fa fa-star"></i>                                        
                                        @endfor                                    
                                    </div> 
                                @endif
                                @endif
                            </h5>
                        </header>
                    </div>
                </div>
                    <div class="col-md-12" id="project_by_id">
                        @if($product->images()->count())
                            <div id="slider" class="flexslider">
                                <ul class="slides">
                                    @foreach($product->images()->orderBy('position', 'asc')->get() as $image)
                                    <li>
                                        {!! Html::image("/assets/products/$image->image") !!}
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                             <div id="carousel" class="flexslider">
                                <ul class="slides">
                                    @foreach($product->images()->where('color', 0)->orderBy('position', 'asc')->get() as $image)
                                    <li>
                                        {!! Html::image("/assets/products/100x100/$image->image") !!}
                                    </li>
                                    @endforeach
                                </ul>
                             </div>
                        @endif()

                            <article>
                                <h4>Бүтээгдэхүүний тайлбар</h4>
                                <div>
                                    <div style="display:none" class="item-thumb">{!! Html::image("assets/products/thumbs/$product->photo", '', ['class'=>'item_thumb'])!!}</div>
                                    <p>{!! $product->description!!}</p>
                                </div>
                            </article>
                    </div>
               @include('layouts.partials.order')                     
            </div>

        <!-- sidebar -->
        <div class="col-md-4">
            <aside>
                <article class="product_details">
                    <h1><strong class="item_price">{{$product->price}} ₮</strong></h1>
                        @if($product->brand)
                        <div class="brand">Брэнд: {!! Html::image("assets/brands/logos/" . $product->brand->logo, '', ['class'=>'brand_logo']) !!}</div>
                        @endif
                        <div class="color width50">Өнгө: 
                            @foreach($product->colors as $color)
                                <i class="fa fa-circle" aria-hidden="true" style="color:{{$color->color}}"></i>
                            @endforeach

                            <select class="form-control item_color">
                                @foreach($product->colors as $color)
                                    <option>{{$color->name}}</option>                                
                                    
                                @endforeach  
                            </select> 
                            <!-- save colors in select                            -->
                                <select class="form-control display-none">
                                    @foreach($product->colors as $color)
                                        <option class="item_colors">{{$color->name}}</option>                                
                                        
                                    @endforeach  
                                </select>     
                        </div>
                        <div class="colored_pictures clearfix">
                            <section class="width50">
                                @foreach($product->images()->where('color', 1)->get() as $image)
                                    <div class="pull-left width50">
                                        {!! Html::image("/assets/products/100x100/$image->image", null, ['class'=>'width100']) !!}
                                    </div>
                                @endforeach                                  
                            </section>      
                        </div>
                        <div class="size">Хэмжээ: 
                            @foreach($product->sizes as $size)
                                <span> {{$size->size}}</span>
                            @endforeach
                        </div>                                                         
                    <div class="list-group width50">

                        <div class="form-group">
                            <label for="exampleInputName2">Тоо ширхэг</label>
                            <input type="text" value="1" class="item_Quantity form-control" id="exampleInputName2">
                        </div>

                        <button type="button" class="btn btn-default btn-sm btn-block item_add"> <i class="fa fa-shopping-cart"></i>  нэмэх</button>
                    </div>
                </article>
            </aside>
        </div>

        </div>

    </div>


</div>

<div class="col-md-8 col-md-offset-2">
    <div class="placeholder50"></div>
    @include('layouts.partials.reklam')
</div>
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

    var swiper = new Swiper('.subbanner-container', {
        pagination: false,
        paginationClickable: true,
        spaceBetween: 30,
        autoplay: false,
        cssWidthAndHeight: false,
        calculateHeight: true,
        slidesPerView: 3,
    });
</script>
    <script>
      simpleCart({
        checkout: {
          type: "SendForm",
          email: "you@yours.com"
        },
        cartStyle : "div"
      });

// order tabs
    $('#myTabs a').click(function (e) {
      e.preventDefault()
      $(this).tab('show')
    })      
    </script>


@stop