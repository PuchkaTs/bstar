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
    <!-- <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>    -->
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=844033775697860";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

@include('layouts.partials.nav')

@yield('body')
<div class="odun grow hidden-xs" v-bind:class="[growsmall]" ></div>
<div class="narun grow hidden-xs" v-bind:class="[growsmall]" ></div>
<div class="timetable">
    <div class="alert alert-warning alert-dismissible fade in" role="alert" style="color:#015a00"> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button> 
        <p>Ажлын өдрүүдэд: 10:00-19:00</p>
        <p>Амралтын өдрүүдэд: 11:00-15:00</p> 
        <p>Лавлах утас: 7610-3080</p> 
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
            }                    
        }
    });
</script>
</body>
</html>