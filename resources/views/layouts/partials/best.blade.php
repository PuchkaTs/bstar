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
                    @include('layouts.partials.product-card')
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
        <div class="row product-list">
            @foreach($gallery->getListForBest() as $product)
                @include('layouts.partials.product-card2')            
            @endforeach

        </div>
</div>