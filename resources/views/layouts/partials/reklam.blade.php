

<div class="subbanner">
@inject('subbanner', 'App\Subbanner')

<div class="subbanner-container swiper-container">
        <div class="swiper-wrapper left1px">
            	@foreach($subbanner->getBanners() as $banner)
                <div class="col-md-4">
                    <li class="swiper-slide subbanner_item">
                        <div style="display:none" class="">{{route('product_path', $banner->id)}}</div>
                        <a class="" href="{{$banner->url}}">
                                {!! Html::image("assets/banners/subbanners/$banner->image", '', ['class'=>''])!!}                        
                            <div class="subbanner_title">
                                <p>{{$banner->title}}</p><span>{{$banner->description}}</span>
                            </div>
                        </a>
                    </li>
                </div>
	           @endforeach   
        </div>
        <!-- Add Pagination -->
        <div class="subbanner-pagination"></div>
    </div>
</div>