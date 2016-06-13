<div class="subbanner">
@inject('gallery', 'App\Gallery')
@if($gallery->where('position',2)->first())
<h1>{{$gallery->where('position',2)->first()->name}}</h1>

    <div class="ontslog-container swiper-container">
            <div class="swiper-wrapper left1px">
                @foreach($gallery->getListForSpecial() as $product)
                <div class="swiper-slide simpleCart_shelfItem">
                    <div class="subbanner-thumb">
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
                            <div class="separator clear-left">
                                <p class="small-text">{{ $product->shorten(100)}} {!! link_to_route('product_path', 'Дэлгэрэнгүй', $product->id, ['class' => 'more'])!!}</p>
                                <div style="display:none" class="item_pagelink">/product/{{$product->id}}</div>

                            </div>
                            <div class="clearfix">
                            </div>
                        </div>
                        <div class="subbanner-title">
                            <button type="button" class="btn btn-default btn-sm btn-block item_add"> <i class="fa fa-shopping-cart"></i>Сагсанд нэмэх</button>
                        </div>
                    </div>
                    <div class="line-hor"></div>
                </div>
                   @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="subbanner-pagination"></div>
        </div>
@endif
</div>