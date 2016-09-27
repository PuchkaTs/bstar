

<div class="subbanner">
@inject('subbanner', 'App\Subbanner')

<div class="swiper-container">
        <div class="row">
            	@foreach($subbanner->getBanners() as $banner)
                <div class="col-md-4 col-xs-4 flexcenter">
                    <li class="swiper-slide subbanner_item">
                        <div style="display:none" class="">{{route('product_path', $banner->id)}}</div>
                        <a class="" href="{{$banner->url}}" target="_blank">
                                {!! Html::image("assets/banners/subbanners/$banner->image", '', ['class'=>''])!!}                        
                            <div class="subbanner_title">
                                <p>{{$banner->title}}</p><span>{{$banner->description}}</span>
                            </div>
                        </a>
                    </li>
                </div>
	           @endforeach
               @if($banner = $subbanner->getRandomBanner())
                <div class="col-md-4 col-xs-4 flexcenter">
                    <li class="swiper-slide subbanner_item">
                        <div style="display:none" class="">{{route('product_path', $banner->id)}}</div>
                        <a class="" href="{{$banner->url}}" target="_blank">
                                {!! Html::image("assets/banners/subbanners/$banner->image", '', ['class'=>''])!!}                        
                            <div class="subbanner_title">
                                <p>{{$banner->title}}</p><span>{{$banner->description}}</span>
                            </div>
                        </a>
                    </li>
                </div>               
               @endif   
        </div>
        <!-- Add Pagination -->
        <div class="subbanner-pagination"></div>
    </div>
</div>
<div class="placeholder50 hidden-xs"></div>