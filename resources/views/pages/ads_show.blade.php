@extends('layouts.default_min')
@section('css')
    <link rel="stylesheet" type="text/css" href="/css/flexslider/flexslider.css">
@stop
@section('content')
<div class="row" style="">
    <div class="col-md-3">
        <section class="card" style="margin-top:116px;">
            <a href="/createad" class="btn btn-primary btn-block" role="button">Зар оруулах</a>    
            <h5 class="item_name">Ангилал:</h5>
            <ul class="list-group">
                @foreach($adstags as $tag)
                <li class="list-group-item">{!!link_to_route('ads_path', $tag->name, $tag->id)!!}</li>
                @endforeach     
            </ul>  
        
            <h5 class="item_name">Нас:</h5>
            @foreach($ages as $age)
            <div class="checkbox">
              <label>
                <input type="checkbox" name="age" value="option1">
                {{$age->title}}
              </label>
            </div>                    
            @endforeach  

            <h5 class="item_name">Үнэ ₮:</h5>                      
            <input id="ex2" type="text" class="span2" value="" data-slider-min="5000" data-slider-max="100000" data-slider-step="20" data-slider-value="[5000,50000]"/> 

            <h5 class="item_name">Хүйс:</h5>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="gender" id="gender1" value="option1">
                Хүү
              </label>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="gender" id="gender2" value="option2">
                Охин
              </label>
            </div>  

            <div class="form-group">
                {!! Form::label('location', 'Байршил:') !!}
                {!! Form::select('location', $locations, 1, ['class'=>'form-control']); !!}
            </div>  

            <button type="submit" class="btn btn-primary btn-block">Хайх</button>                                                                                                           
        </section>
    </div> 

    <div class="col-md-9" id="ads" style="min-height: 500px">
        <div class="col-md-8">
            <header>
                <h3 style="padding:15px;">Үнэгүй зар</h3>

            </header>
            <div class="">
                <div class="media ads">

                  <div class="media-body" style="padding-left:10px;">
                    <div class="flex">
                        <h4 class="media-heading">{!! link_to_route('ads_show_path', $ads->title, $ads->id)!!}
                        </h4>
                    </div>
                    {{$ads->description}}
                  </div>

                    @if($ads->images()->count())
                        <div id="slider" class="flexslider">
                            <ul class="slides">
                                @foreach($ads->images()->latest()->get() as $image)
                                <li>
                                    {!! Html::image("/assets/ads/$image->image") !!}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                         <div id="carousel" class="flexslider">
                            <ul class="slides">
                                @foreach($ads->images()->latest()->get() as $image)
                                <li>
                                    {!! Html::image("/assets/ads/$image->image") !!}
                                </li>
                                @endforeach
                            </ul>
                         </div>
                    @endif()                  
                </div>  

                <div style="text-align: center"></div>

                <div class="placeholder100"></div>

            </div>
        </div>
        <div class="col-md-4">
            <aside  style="margin-top: 20px;">
                <article class="product_details">
                    <h1><strong class="item_price">{{$ads->price}} ₮</strong></h1>

                    <p><b>Утас: {{$ads->phone}}</b></p>
                    <p>Төрөл: {{$ads->adstag->name}}</p>
                    <p>Хүйс: {{$ads->gender}}</p>
                    <p>Нас: {{$ads->adsage->title}}</p>
                    <p>Байршил: {{$ads->location->name}}</p>
                    <div class="size">
                    </div>     
                </article>
            </aside>
        </div>

    </div>
</div>
@stop

@section('script')
<script src="/js/flexslider/jquery.flexslider-min.js"></script>

<script>

$(window).load(function() {
  // The slider being synced must be initialized first
  $('#carousel').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    itemWidth: 100,
    itemMargin: 5,
    asNavFor: '#slider'
  });

  $('#slider').flexslider({
    animation: "slide",
    controlNav: false,
    animationLoop: false,
    slideshow: false,
    sync: "#carousel"
  });
});
</script>

@stop