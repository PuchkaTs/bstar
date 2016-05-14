<div class="subbanner">
@inject('gallery', 'App\Gallery')
@if($gallery->where('position',3)->first())
<h1>{{$gallery->where('position',3)->first()->name}}</h1>
@endif
    <div class="best-container swiper-container">
            <div class="swiper-wrapper left1px">
                @foreach($gallery->getListForBest() as $product)
                <div class="swiper-slide">
                    <div class="subbanner-thumb  simpleCart_shelfItem">
                        <div>
                            <a href="{{route('product_path', $product->id)}}">{!! Html::image("assets/products/thumbs/$product->photo")!!}</a>                          
                        </div>
                        <div class="info">
                            <div class="row">
                                <div class="rating">
                                    <i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                </i><i class="price-text-color fa fa-star"></i><i class="price-text-color fa fa-star">
                                </i><i class="price-text-color fa fa-star"></i>
                                </div>
                                <div class="price">
                                    <h4>{{$product->name}}</h4>
                                    <h5 class="price-text-color">{{$product->price}}₮</h5>
                                </div>                             
                            </div>
                            <div class="separator clear-left">
                                <p class="small-text">{{ $product->shorten(100)}} {!! link_to_route('product_path', 'Дэлгэрэнгүй', $product->id, ['class' => 'more'])!!}</p>
                            </div>
                            <div class="clearfix">
                            </div>
                        </div>
                        <div class="subbanner-title">
                            <button type="button" class="btn btn-default btn-sm btn-block"> <i class="fa fa-shopping-cart"></i>Сагсанд нэмэх</button>
                        </div>
                    </div>
                    <div class="line-hor"></div>
                </div>
                   @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="subbanner-pagination"></div>
        </div>
</div>