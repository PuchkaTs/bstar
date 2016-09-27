<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
    <title>Babystar.mn</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('meta')

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300" rel="stylesheet">    
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/idangerous.swiper.css">
    <link rel="stylesheet" href="/css/bootstrap-slider.min.css">
    <link rel="stylesheet" href="/css/sweetalert.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="icon" href="/fav.ico">    
    @yield('css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- Leave those next 4 lines if you care about users using IE8 -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--Start of Zopim Live Chat Script-->
    <script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?42ZhrGcyXCHuCLrAhDRKRBuk5Bw5XeMU";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");

      $zopim(function() {
        $zopim.livechat.setGreetings({
            'online': 'Танд туслахад бэлэн байна.',
            'offline': 'Та бидэнд мэссэж үлдээнэ үү.'
            });
            $zopim.livechat.setLanguage('en');
            $zopim.livechat.concierge.setTitle('Танд тусламж хэрэгтэй юу?');
    });    
    </script>
    <!--End of Zopim Live Chat Script-->    
</head>
<body id="app">
@include('layouts.partials.facebooksdk')
@include('layouts.partials.analytics')
@include('layouts.partials.nav')

@yield('body')
<div class="addedMessage" v-bind:class="[added, animation, animated]">
    <p>Бараа нэмэгдлээ</p>
</div>
<div class="odun grow hidden-xs" v-bind:class="[growsmall]" ></div>
<div class="narun grow hidden-xs" v-bind:class="[growsmall]" ></div>
<div class="timetable">
    <div class="alert alert-warning alert-dismissible fade in" role="alert" style="color:#015a00"> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button> 
        <p>Ажлын өдрүүдэд: 10:00-19:00</p>
        <p>Амралтын өдрүүдэд: 11:00-15:00</p> 
        <p>Лавлах утас: 7610-3080, 80228033</p> 
    </div>
</div>
<!-- Page Content -->
<div class="container">
  @yield('content')
</div>
@include('layouts.partials.footer')
<!-- /.container -->


<!-- Including Bootstrap JS (with its jQuery dependency) so that dynamic components work -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="/js/idangerous.swiper.js"></script>
<script src="/js/bootstrap-slider.min.js"></script>
<script src="/js/sweetalert.min.js"></script>
<script src="/js/simpleCart.js"></script>
<script src="/js/vue.js"></script>


@yield('script')
@include('layouts.flash')
<script type="text/javascript">
    new Vue({
        el: '#app',
        data: {
            growsmall: '',   
            method: 'cash',
            added: '',
            animation: '',
            animated: ''    
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
            methodCard:function(){
                this.method = 'card';
                console.log(this.method);
            },
            methodCash:function(){
                this.method = 'cash';
                console.log(this.method);
            },  
            methodAccount:function(){
                this.method = 'account';
                console.log(this.method);
            },                       
            gotocart: function(){
                location.replace('/cart');
            },
            productAdded: function(){

                this.added = 'ended';
                this.animation = '';
                this.animated = '';                
                setTimeout(function () {
                
                    vm.added = 'added';
                    vm.animation = 'bounceInRight';
                    vm.animated = 'animated';

                    console.log(vm.added);

                }, 250);                

                var vm = this;

                setTimeout(function () {
                
                    vm.added = 'ended';
                    vm.animation = '';
                    vm.animated = '';                     

                    console.log(vm.added);

                }, 5000);


            },                                  
        }
    });
</script>
</body>
</html>