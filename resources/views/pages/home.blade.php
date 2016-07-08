@extends('layouts/default_min')

@section('css')


@stop

@section('body')
    @include('layouts.partials.mainbanner')

@stop

@section('content')
    <div class="placeholder50"></div>
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
    $('.arrow-left').on('click', function(e){
      e.preventDefault()
      mySwiper.swipePrev()
    })
    $('.arrow-right').on('click', function(e){
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
    var swiper = new Swiper('.ontslog-container', {
        pagination: false,
        paginationClickable: true,
        spaceBetween: 30,
        autoplay: false,
        cssWidthAndHeight: false,
        calculateHeight: true,
        slidesPerView: 4,
    });
    var swiper = new Swiper('.best-container', {
        pagination: false,
        paginationClickable: true,
        spaceBetween: 30,
        autoplay: false,
        cssWidthAndHeight: false,
        calculateHeight: true,
        slidesPerView: 4,
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

      new Vue({
        el: '#app',
        data: {
            growsmall: '',          
        },

        created: function(){
            this.scrolltrigger();
        },

        methods: {
            scrolltrigger: function(){
                    var vm = this;
                $( window ).scroll(function() {
                    var scrollposition = $(this).scrollTop();
                    console.log(scrollposition);                    
                    if (scrollposition < (200)){
                        vm.growsmall = '';
                    } else {
                        vm.growsmall = "grow-small";
                    }
                });
            },                      
        }
    });
    </script>
@stop

