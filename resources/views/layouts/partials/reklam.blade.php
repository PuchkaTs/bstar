

<div class="subbanner">
@inject('subbanner', 'App\Subbanner')
<h1></h1>
<div class="placeholder75"></div>
<div class="subbanner-container swiper-container">
        <div class="swiper-wrapper left1px">
            <ul class="row">
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
            </ul>
        </div>
        <!-- Add Pagination -->
        <div class="subbanner-pagination"></div>
    </div>
</div>