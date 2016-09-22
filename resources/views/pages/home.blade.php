@extends('layouts/default_min')

@section('meta')
<meta property="og:title" content="Babystar.mn хүүхдийн сайт" />
<meta property="og:type" content="Хүүхдийн бараа худалдааны сайт" />
<meta property="og:url" content="https://www.babystar.mn" />
<meta property="og:image" content="https://www.babystar.mn/assets/banners/mainbanners/d5RldL1nwS88ORi7osY4.jpg" />
@stop

@section('body')
    @include('layouts.partials.mainbanner')

@stop

@section('content')
    <div class="placeholder50 hidden-xs"></div>
    <div class="placeholder20 visible-xs"></div>
    @include('layouts.partials.reklam')
    @include('layouts.partials.special')
    @include('layouts.partials.best')
    @include('layouts.partials.news')

@stop


@section('script')
    <script>
    var mySwiper = new Swiper('.swiper-container',{
      pagination: '.pagination',
      loop:true,
      grabCursor: true,
      paginationClickable: true,
      calculateHeight: true,

    })
    $('#arrow-left').on('click', function(e){
      e.preventDefault()
      mySwiper.swipePrev()
    })
    $('#arrow-right').on('click', function(e){
      e.preventDefault()
      mySwiper.swipeNext()
    })
    var swiper = new Swiper('.subbanner-container', {
        pagination: false,
        paginationClickable: true,
        spaceBetween: 30,
        autoplay: false,
        cssWidthAndHeight: false,
        calculateHeight: true,
        slidesPerView: 4,
    });
    var specialswiper = new Swiper('.ontslog-container', {
        pagination: false,
        paginationClickable: true,
        spaceBetween: 30,
        autoplay: false,
        cssWidthAndHeight: false,
        calculateHeight: true,
        slidesPerView: 4,
    });

    $('#special-arrow-left').on('click', function(e){
      e.preventDefault()
      specialswiper.swipePrev()
    })

    $('#special-arrow-right').on('click', function(e){
      e.preventDefault()
      specialswiper.swipeNext()
    })     

    var bestswiper = new Swiper('.best-container', {
        pagination: false,
        paginationClickable: true,
        spaceBetween: 30,
        autoplay: false,
        cssWidthAndHeight: false,
        calculateHeight: true,
        slidesPerView: 4,
    });
    $('#best-arrow-left').on('click', function(e){
      e.preventDefault()
      bestswiper.swipePrev()
    })
    $('#best-arrow-right').on('click', function(e){
      e.preventDefault()
      bestswiper.swipeNext()
    })    
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

