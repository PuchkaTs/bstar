<div class="subbanner  hidden-xs">
@inject('gallery', 'App\Gallery')
@if($gallery->where('position',2)->first())
<h2 class="background-pink">{{$gallery->where('position',2)->first()->name}}</h2>
    <a class="arrow-left" id="special-arrow-left" href="#"></a> 
    <a class="arrow-right" id="special-arrow-right" href="#"></a>
    <div class="ontslog-container swiper-container">
            <div class="swiper-wrapper left1px">
                @foreach($gallery->getListForSpecial() as $product)
                    @include('layouts.partials.product-card')
                @endforeach
            </div>
        </div>
            <!-- Add Pagination -->
    <div class="pagination" id="special-pagination"></div>         
@endif
</div>

<div class="subbanner visible-xs">
<h3>{{$gallery->where('position',2)->first()->name}}</h3>
        <div class="row product-list">
            @foreach($gallery->getListForSpecial() as $product)
                @include('layouts.partials.product-card2')
            @endforeach

        </div>
</div>