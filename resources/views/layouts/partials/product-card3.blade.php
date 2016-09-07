<div class="simpleCart_shelfItem col-md-4 col-sm-6 textcenter">
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
    <div class="product-card subbanner-thumb card-height">   
        <div>
            <div style="display:none" class="item_pageLink">{{route('product_path', $product->id)}}</div>
            <a href="{{route('product_path', $product->id)}}" class="item-thumb">{!! Html::image("/assets/products/thumbs/$product->photo", '', ['class'=>'item_thumb'])!!}</a>                          
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
            <div class="row">
                <div class="col-xs-6" style="padding-right:2px;">
                    <button type="button" class="btn btn-default btn-sm btn-block item_add"> <i class="fa fa-shopping-cart"></i>Сагсанд хийх</button>
                </div>
                <div class="col-xs-6" style="padding-left:2px;">
                    <button type="button" class="btn btn-default btn-sm btn-block item_add" @click="gotocart()"> <i class="fa fa-paper-plane"></i>Шууд авах</button>
                </div>
                
            </div>
        </div>
    </div>
</div>