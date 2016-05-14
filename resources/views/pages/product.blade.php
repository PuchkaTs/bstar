@extends('layouts/default_min')

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/flexslider/flexslider.css">
@stop

@section('content')
<div class="simpleCart_shelfItem">
    <div class="placeholder100 row" style="margin-top: 50px;">
        <div class="col-md-8 col-lg-6 col-lg-offset-2 gheader">
            <header>
                <h3 class="item_name">{{ $product->name }}</h3>

            </header>

        </div>
    </div>
<div class="row" id="projects" style="min-height: 500px">
    <div class="col-md-8 col-lg-6 col-lg-offset-2">
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
                            @foreach($product->images()->orderBy('position', 'asc')->get() as $image)
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
    </div>
    <!-- sidebar -->
    <div class="col-md-4 col-lg-2">
        <aside>
            <article>
                <h1><strong class="item_price">{{$product->price}} ₮</strong></h1>
                <div class="list-group">
                <div class="form-group">
                    <label for="exampleInputName2">Тоо ширхэг</label>
                    <input type="text" value="1" class="item_Quantity form-control" id="exampleInputName2">
                </div>

                <button type="button" class="btn btn-default btn-sm btn-block item_add"> <i class="fa fa-shopping-cart"></i>Сагсанд нэмэх</button>
                </div>
            </article>
        </aside>
    </div>

    </div>
</div>

<div class="col-md-10 col-lg-8 col-lg-offset-2 gheader">
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
    </script>
@stop