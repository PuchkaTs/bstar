

<div class="textcenter img100 paddingtop0">
@inject('topbanner', 'App\TopBanner')

<div class="subbanner-container swiper-container">

        <div class="swiper-wrapper left1px">

            @if($banner = $topbanner->randombanner())

                <a class="" href="{{$banner->url}}">

                    {!! Html::image("assets/banners/subbanners/$banner->image", '', ['class'=>''])!!}                        
                </a>
            @endif

        </div>
        <!-- Add Pagination -->
    </div>
</div>