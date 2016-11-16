@inject('pmenus', 'App\ProductMenu')
@inject('placemenus', 'App\PlaceMenu')
@inject('companymenus', 'App\Menu')
@inject('Odun', 'App\Oduntag')
<div class="headercenter">
    <div class="main">
        <img src="/assets/common/skyline02-bg2.png">
    </div>
</div>
<div class="xs_logo"><a href="/"><img src="/assets/common/logo.png"></a></div>

<header class="mainheader">
    <div class="container">
        <nav class="Navigation__top row">
            <!-- <h1 class="logo"><a class="white" href="/">BabyStar</a></h1> -->
            <!-- <h1 class="logo hidden-xs"><a href="/"><img src="/assets/common/logo.png"></a></h1> -->
            <div class="Navigation__search hidden-xs">
                    {!!Form::open(['method'=>'GET', 'route'=>'search_path', 'class'=>'form-inline'])!!}
                    {!!Form::input('search', 'q', null, ['placeholder' => 'Хайх', 'class'=>'simplebox', 'autofocus'])!!}
                    <i><span class="glyphicon glyphicon-search" aria-hidden="true"></span></i>
                    {!!Form::close()!!}   
            </div>
            <ul class="Navigation__account nav">
            @if( $currentUser)
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ $currentUser->name }} <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#"><i class="fa fa-user"></i> Хувийн мэдээлэл</a></li>
                    <li><a href="/logout"><i class="fa fa-sign-out"></i> Гарах</a></li>
                  </ul>
                </li>                           
            @else            
                <li><a href="{{ route('registration_path_2') }}" data-toggle="" data-target="">Бүртгүүлэх</a></li>                
                <li><a href="#" data-toggle="modal" data-target="#loginModal">Нэвтрэх</a></li>
            @endif
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Тусламж <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="/content/buy"><i class="fa fa-share" aria-hidden="true"></i>Худалдан авалт</a></li>
                    <li><a href="/content/delivery"><i class="fa fa-truck" aria-hidden="true"></i>Хүргэлт</a></li>
                    <li><a href="/content/return"><i class="fa fa-exchange" aria-hidden="true"></i></i>Буцаалт</a></li>
                  </ul>
                </li>            
                <li class="cartButton"><a href="{{ route('cart_path') }}" class=""><span id="cartItemCountId" class="simpleCart_quantity cartItemCount"></span></a>
                    @include('layouts.partials.minicart')
                </li>            
            </ul>
        </nav>
    </div>

        <nav class="navbar-default secondary-nav navbar ">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                </div>
            <div class="flexcenter ">

                <div id="navbar" class="collapse navbar-collapse">                
                    <ul class="zeroed secondary-nav--left">
                        <li class="dropdown product ">
                            <a href="" class="navbar-link dropdown-toggle white-bold" data-toggle="dropdown" style="color:white;">
                                Бүх бараа <b class="caret"></b>
                            </a>

                            <ul class="dropdown-menu">
                                <!-- special 2 menus -->
                                    <li class="side-menu menu-sale"><a href="{{ route('sale_products_path') }}" style="color:#eb1c24;">ХЯМДРАЛ</a> </li>                            
                                    <li class="side-menu menu-new"><a href="{{ route('new_products_path') }}" style="color:#eb1c24;">ШИНЭ БАРАА </a></li>
                                    <li class="side-menu"><a href="{{ route('all_products_path') }}" style="color:#eb1c24;">БҮХ БАРАА </a></li>
                                    <li role="separator" class="divider"></li>
                                <!-- end of special 2 menus -->
                                @foreach( $pmenus->getListForMenu() as $menu)
                                    @if($menu->name != 'Бусад бараа')
                                    <li class="side-menu"><a href="{{ route('menu_path', $menu->id) }}">{{$menu->name}} <i class="fa fa-caret-left gurvaljin"></i></a>
                                        <div class="flipside-menu">
                                            <div class="row">
                                                 <ul class="col-md-9 row">

                                                 @foreach($menu->productTypes->chunk(3) as $items)
                                                    <div class="row">
                                                        @foreach($items as $type)
                                                                <li class="companyType col-sm-4" style=""><h6><a href="{{ route('type_path', $type->id) }}">{{$type->name}}</a></h6>
                                                                    <ul class="companyList">
                                                                    @if( $type->products->count() == 0 )
                                                                    {!! $type->subTypesInMenu()!!}
                                                                    @endif
                                                                    @if( $type->products->count() > 0 )
                                                                    {!! $type->productsInType()!!}
                                                                    @endif                                                                    
                                                                    </ul>

                                                                </li>
                                                        @endforeach
                                                    </div>
                                                    @endforeach
                                                 </ul>
                                                 <section class="col-md-3">
                                                    <div class="row">
                                                        <div class="col-md-12 zeroed">
                                                            @foreach($menu->promotions as $promotion)
                                                                <a href="/{{$promotion->url}}"><img class="promotion" src="/assets/banners/promotions/{{$promotion->image}}"></a>
                                                            @endforeach                                                        
                                                        </div>
                                                    </div>

                                                 </section>
                                             </div>
                                        </div>

                                    </li>
                                    @endif
                                @endforeach
                                    <li class=""><a href="{{ route('other_products_path') }}" >Бусад бараа</a></li>

                            </ul>
                        </li>   
                        <!-- buh delguur -->
                        <li id="navbar-link--work" class="stores">
                            <a class="navbar-link" href="/stores" style="color:white;">Бүх дэлгүүр</a>
                        </li>

                        <li class="dropdown stores hidden">
                            <a href="" class="navbar-link dropdown-toggle" data-toggle="dropdown" style="color:white;">
                                Бүх дэлгүүр <b class="caret"></b>
                            </a>

                            <ul class="dropdown-menu">
                                @foreach( $companymenus->getListForMenu() as $menu)
                                    @if($menu->deep == 1)
                                    <li class="side-menu"><a href="{{ route('company_menu_path', $menu->id) }}">{{$menu->name}}</a>
                                    </li>
                                    @endif
                                    @if($menu->deep == 2)
                                    <li class="side-menu"><a href="{{ route('company_menu_path', $menu->id) }}">{{$menu->name}} <i class="fa fa-caret-left gurvaljin"></i></a>
                                        <div class="flipside-menu width900">
                                            <div class="row">
                                                 <ul class="col-md-9">
                                                 @foreach($menu->companyTypes->chunk(2) as $items)
                                                    <div class="row">                                             
                                                    @foreach($items as $type)
                                                            <li class="companyType col-sm-6" style=""><h6>{{$type->name}}</h6>
                                                                <ul class="companyList">
                                                                {!! $type->companiesInMenu()!!}

                                                                </ul>

                                                            </li>
                                                    @endforeach
                                                    </div>
                                                    @endforeach                                                
                                                 </ul>
                                                 <section class="col-md-3">
                                                    <div class="row">
                                                        <div class="col-md-12 zeroed">
                                                            @foreach($menu->promotions as $promotion)
                                                                <a href="/{{$promotion->url}}"><img class="promotion" src="/assets/banners/promotions/{{$promotion->image}}"></a>
                                                            @endforeach                                                        
                                                        </div>
                                                    </div>

                                                 </section>
                                             </div>
                                        </div>

                                    </li>
                                    @endif
                                    @if($menu->deep == 3)
                                        <li class="side-menu"><a href="{{ route('company_menu_path', $menu->id) }}">{{$menu->name}} <i class="fa fa-caret-left gurvaljin"></i></a>
                                            <div class="flipside-menu">
                                                <div class="row">
                                                     <ul class="col-md-8">
                                                     @foreach($menu->companyTypes->chunk(2) as $items)
                                                        <div class="row">                                             
                                                        @foreach($items as $type)
                                                                <li class="companyType col-sm-6" style=""><h6>{{$type->name}}</h6>
                                                                    <ul class="companyList">
                                                                    {!! $type->subTypesInMenu()!!}

                                                                    </ul>

                                                                </li>
                                                        @endforeach
                                                        </div>
                                                        @endforeach                                                
                                                     </ul>
                                                     <section class="col-md-4">
                                                        <div class="row">
                                                            <div class="col-md-12 zeroed">
                                                                @foreach($menu->promotions as $promotion)
                                                                    <a href="/{{$promotion->url}}"><img class="promotion" src="/assets/banners/promotions/{{$promotion->image}}"></a>
                                                                @endforeach                                                        
                                                            </div>
                                                        </div>

                                                     </section>
                                                 </div>
                                            </div>

                                        </li>                                    
                                    @endif
                                @endforeach
                            </ul>   
                        </li>
                        <!-- buh delguur duussan       -->

                        <!-- uilchilgeenii gazruud -->
                        <li class="dropdown places">
                            <a href="" class="navbar-link dropdown-toggle" data-toggle="dropdown" style="color:white;">
                                Үйлчилгээний газар  <b class="caret"></b>
                            </a>

                            <ul class="dropdown-menu">
                                @foreach( $placemenus->getListForMenu() as $menu)
                                    @if($menu->deep == 1)
                                    <li class="side-menu"><a href="{{ route('place_menu_path', $menu->id) }}">{{$menu->name}}</a>
                                    </li>
                                    @endif
                                    @if($menu->deep == 2)
                                    <li class="side-menu"><a href="{{ route('place_menu_path', $menu->id) }}">{{$menu->name}} <i class="fa fa-caret-left gurvaljin"></i></a>
                                        <div class="flipside-menu">
                                            <div class="row">
                                                 <ul class="col-md-8">
                                                 @foreach($menu->placeTypes->chunk(2) as $items)
                                                    <div class="row">                                             
                                                    @foreach($items as $type)
                                                            <li class="companyType col-sm-6" style=""><h6>{{$type->name}}</h6>
                                                                <ul class="companyList">
                                                                {!! $type->placesInMenu()!!}

                                                                </ul>

                                                            </li>
                                                    @endforeach
                                                    </div>
                                                    @endforeach                                                
                                                 </ul>
                                                 <section class="col-md-4">
                                                    <div class="row">
                                                        <div class="col-md-12 zeroed">
                                                            @foreach($menu->promotions as $promotion)
                                                                <a href="/{{$promotion->url}}"><img class="promotion" src="/assets/banners/promotions/{{$promotion->image}}"></a>
                                                            @endforeach                                                        
                                                        </div>
                                                    </div>

                                                 </section>
                                             </div>
                                        </div>

                                    </li>
                                    @endif
                                    @if($menu->deep == 3)
                                        <li class="side-menu"><a href="{{ route('place_menu_path', $menu->id) }}">{{$menu->name}} <i class="fa fa-caret-left gurvaljin"></i></a>
                                            <div class="flipside-menu">
                                                <div class="row">
                                                     <ul class="col-md-8">
                                                     @foreach($menu->placeTypes->chunk(2) as $items)
                                                        <div class="row">                                             
                                                        @foreach($items as $type)
                                                                <li class="companyType col-sm-6" style=""><h6>{{$type->name}}</h6>
                                                                    <ul class="companyList">
                                                                    {!! $type->subTypesInMenu()!!}

                                                                    </ul>

                                                                </li>
                                                        @endforeach
                                                        </div>
                                                        @endforeach                                                
                                                     </ul>
                                                     <section class="col-md-4">
                                                        <div class="row">
                                                            <div class="col-md-12 zeroed">
                                                                @foreach($menu->promotions as $promotion)
                                                                    <a href="/{{$promotion->url}}"><img class="promotion" src="/assets/banners/promotions/{{$promotion->image}}"></a>
                                                                @endforeach                                                        
                                                            </div>
                                                        </div>

                                                     </section>
                                                 </div>
                                            </div>

                                        </li>                                    
                                    @endif
                                @endforeach
                            </ul>   
                        </li>
                        <!-- uilchilgee duussan       -->
                        <!-- Medee medeelel -->
                        <li id="navbar-link--work" class="news">
                            <a class="navbar-link" href="/news" style="color:white;">Мэдээлэл & Зөвлөгөө</a>
                        </li>
                        <!-- Oduni tses -->
                        <li class="dropdown recomend">
                            <a href="" class="navbar-link dropdown-toggle" data-toggle="dropdown" style="color:white;">
                                Одун & Нарун <b class="caret"></b>
                            </a>

                            <ul class="dropdown-menu ">
                                @foreach( $Odun->getListForMenu() as $menu)
                                    <li class="side-menu"><a href="{{ route('odun_menu_path', $menu->id) }}">{{$menu->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>                        
                        <!-- BLog -->
                        <li id="navbar-link--work" class="blog">
                            <a class="navbar-link" href="/blogs" style="color:white;">Блог</a>
                        </li>
                        <!-- baiguullaga nemeh -->
                        <li id="navbar-link--work" class="ads">
                            <a class="navbar-link" href="/ads" style="color:white;"><i class="fa fa-plus"></i> Үнэгүй зар</a>
                        </li>
                </ul>
            </div>
            </div>

            <div class="flexcenter">
                <ul class="zeroed secondary-nav--left black">
                    <!-- huuhdin burtgel -->
                    <li>
                        <a class="navbar-link" href="/registration-form"><i class="fa fa-child"></i>Хүүхдийн бүртгэл</a>
                    </li>
                    <!-- huuhdin burtgel -->
                    <li>
                        <a class="navbar-link" href="/content/card"><i class="fa fa-credit-card"></i>Бэлгийн карт</a>
                    </li>
                    <!-- huuhdin burtgel -->
                    <li>
                        <a class="navbar-link" href="/content/present"><i class="fa fa-gift"></i>Бэлгийн багц</a>
                    </li>
                    <!-- huuhdin burtgel -->
                    <li>
                        <a class="navbar-link" href="/content/wishlist"><i class="fa fa-heart"></i>Хүслийн жагсаалт</a>
                    </li>
                    <!-- huuhdin burtgel -->
                    <li>
                        <a class="navbar-link" href="/content/loyalty"><i class="fa fa-leaf"></i>Хөнгөлөлтийн карт</a>
                    </li>
                    <!-- huuhdin burtgel -->
                    <li>
                        <a class="navbar-link" href="/content/willing"><i class="fa fa-thumbs-up"></i>Сайн дурын</a>
                    </li>

                </ul>
            </div>

        </nav>        
</header>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Нэвтрэх</h4>
      </div>
      <div class="modal-body">
            {!! Form::open(['url' => '/login']) !!}
                <!-- Mail form input -->
                <div class="form-group">
                    {!! Form::label('email', 'Имэйл:') !!}
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Password form input -->
                <div class="form-group">
                    {!! Form::label('password', 'Нууц үг:') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <!-- Submit form input -->
                <div class="form-group">    
                    {!! Form::submit('Нэвтрэх', ['class' => 'btn btn-primary btn-block'])!!}
                </div>
                
            {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
      </div>
    </div>
  </div>
</div>