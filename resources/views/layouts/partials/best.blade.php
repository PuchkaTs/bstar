@inject('gallery', 'App\Gallery')
@if($gallery->where('position',3)->first())
<div class="subbanner hidden-xs">
<h2 class="background-orange">{{$gallery->where('position',3)->first()->name}}</h2>
<div>
    <a class="arrow-left" id="best-arrow-left" href="#"></a> 
    <a class="arrow-right" id="best-arrow-right" href="#"></a>
    <div class="best-container swiper-container">
            <div class="swiper-wrapper left1px">
                @foreach($gallery->getListForBest() as $product)
                <div class="swiper-slide simpleCart_shelfItem">
                    @if($product->sale)
                        <div class="product-sale-home">
                            <img src="assets/common/sale.png">
                        </div>   
                    @endif
                    @if($product->new)
                        <div class="product-new-home">
                            <img src="assets/common/new.png">
                        </div>  
                    @endif
             
                    <div class="subbanner-thumb ">

                        <div>
                            <a href="{{route('product_path', $product->id)}}">{!! Html::image("assets/products/thumbs/$product->photo", '', ['class'=>'item_thumb'])!!}</a>                          
                            
                        </div>
                        <div class="info">
                            <div class="row">
                                @if ($product->stars >= 1)
                                @if ($product->stars <= 5)
                                    <div class="rating">                    
                                        @for ($i = 0; $i < $product->stars; $i++)
                                            <i class="price-text-color fa fa-star"></i>                                        
                                        @endfor                                    
                                    </div> 
                                @endif
                                @endif
                                <div class="price">
                                    <h4 class="item_name">{{$product->name}}</h4>
                                    <h5 class="price-text-color item_price">{{$product->price}}₮</h5>
                                </div>                             
                            </div>
                            @if( ! $product->colors->count())
                                @if( ! $product->sizes->count() )
                                    <div class="separator clear-left">
                                        <p class="small-text">{{ $product->shorten(100)}} {!! link_to_route('product_path', 'Дэлгэрэнгүй', $product->id, ['class' => 'more'])!!}</p>
                                        <div style="display:none" class="item_pagelink">/product/{{$product->id}}</div>
                                    </div>
                                @endif
                            @endif
                            <div class="clearfix">
                            </div>
                        </div>

                        <!-- color information -->
                        @if($product->colors->count())
                        <div class="color">Өнгө: 
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
                        @endif
                        <!-- end of color information -->

                        <!-- size information -->
                        @if($product->sizes->count())
                        <div class="size">Хэмжээ: 
                            <select class="form-control item_size">
                                @foreach($product->sizes as $size)
                                    <option>{{$size->name}}</option>                                
                                    
                                @endforeach  
                            </select> 
                            <!-- save sizes in select                            -->
                                <select class="form-control display-none">
                                    @foreach($product->sizes as $size)
                                        <option class="item_sizes">{{$size->name}}</option>                                
                                        
                                    @endforeach  
                                </select>     
                        </div>
                        @endif
                        <!-- end of size information -->                        
                        <div class="placeholder50"></div>
                        
                        <div class="button-add">
                            <button type="button" class="btn btn-default btn-sm btn-block item_add"> <i class="fa fa-shopping-cart"></i>Сагсанд нэмэх</button>
                        </div>

                    </div>
                    
                    <div class="line-hor"></div>
                </div>
                   @endforeach
            </div>

        </div>
            <!-- Add Pagination -->
    <div class="pagination" id="best-pagination"></div>        
</div>        
@endif        
</div>

<div class="subbanner visible-xs">
<h3>{{$gallery->where('position',3)->first()->name}}</h3>
        <div class="row">
            @foreach($gallery->getListForBest() as $product)
                <div class="simpleCart_shelfItem col-md-4 col-xs-12 textcenter">
               
                    <div class="product-card subbanner-thumb">    
                @if($product->sale)
                    <div class="product-sale">
                        <img src="/assets/common/sale.png">
                    </div>   
                @endif
                @if($product->new)
                    <div class="product-new">
                        <img src="/assets/common/new.png">
                    </div>  
                @endif                                                             
                        <div>
                            <div style="display:none" class="item_pageLink">{{route('product_path', $product->id)}}</div>
                            <a href="{{route('product_path', $product->id)}}" class="item-thumb">{!! Html::image("assets/products/thumbs/$product->photo", '', ['class'=>'item_thumb'])!!}</a>                          
                        </div>
                        <div class="info">
                            <div class="row">
                                @if ($product->stars >= 1)
                                @if ($product->stars <= 5)
                                    <div class="rating">                    
                                        @for ($i = 0; $i < $product->stars; $i++)
                                            <i class="price-text-color fa fa-star"></i>                                        
                                        @endfor                                    
                                    </div> 
                                @endif
                                @endif
                                <div class="price">
                                    <h4 class="item_name">{{$product->name}}</h4>
                                    <h5 class="price-text-color item_price">{{$product->price}}₮</h5>
                                </div>                             
                            </div>
                            @if( ! $product->colors->count())
                                @if( ! $product->sizes->count() )
                                    <div class="separator clear-left">
                                        <p class="small-text">{{ $product->shorten(100)}} {!! link_to_route('product_path', 'Дэлгэрэнгүй', $product->id, ['class' => 'more'])!!}</p>
                                        <div style="display:none" class="item_pagelink">/product/{{$product->id}}</div>
                                    </div>
                                @endif
                            @endif
                            <div class="clearfix">
                            </div>
                        </div>
                        <!-- color information -->
                        @if($product->colors->count())
                        <div class="color">Өнгө: 
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
                        @endif
                        <!-- end of color information -->

                        <!-- size information -->
                        @if($product->sizes->count())
                        <div class="size">Хэмжээ: 
                            <select class="form-control item_size">
                                @foreach($product->sizes as $size)
                                    <option>{{$size->name}}</option>                                
                                    
                                @endforeach  
                            </select> 
                            <!-- save sizes in select                            -->
                                <select class="form-control display-none">
                                    @foreach($product->sizes as $size)
                                        <option class="item_sizes">{{$size->name}}</option>                                
                                        
                                    @endforeach  
                                </select>     
                        </div>
                        @endif
                        <!-- end of size information --> 
                        <div class="placeholder50"></div>
                        
                        <div class="button-add">
                            <button type="button" class="btn btn-default btn-sm btn-block item_add"> <i class="fa fa-shopping-cart"></i>Сагсанд нэмэх</button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
</div>