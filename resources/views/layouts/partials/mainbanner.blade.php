 @inject('mainBanner', 'App\Banner')
  <div class="mainbanner">
    <a class="arrow-left" id="arrow-left" href="#"></a> 
    <a class="arrow-right" id="arrow-right" href="#"></a>
    <div class="swiper-container">
      <div class="swiper-wrapper">
        @foreach($mainBanner->getBanners() as $aban)
        <div class="swiper-slide"> <img src="assets/banners/mainbanners/{{$aban->image}}"> </div>
        @endforeach
      </div>
    </div>
    <div class="pagination"></div>
  </div>