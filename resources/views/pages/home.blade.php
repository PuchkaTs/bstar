@extends('layouts/default_min')

@section('meta')
    <meta property="og:title" content="Babystar.mn" />
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Монголын анхны хүүхдийн бараа үйлчилгээ, зөвлөгөө мэдээллийн цогц сайт" />
    <meta property="og:image" content="https://www.babystar.mn/assets/banners/subbanners/main.jpg" />

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
    @if(!$currentUser)
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Та манай сайтаар facebook хаягаараа нэвтрэн үйлчлүүлээрэй</h4>
          </div>
          <div class="modal-body">
            <p style="text-align: center;"><img src="/assets/common/logo.png"></p>
          </div>
          <div class="modal-footer">
<p><a class="btn btn-primary btn-block" style="background-color: #3b5998; border: 0px;" href="redirect" role="button">Facebook хаягаар нэвтрэх</a></p>
          
          </div>
        </div>
      </div>
    </div>
    @endif
@stop


@section('script')
    <script>
    $('#myModal').modal('show');

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

