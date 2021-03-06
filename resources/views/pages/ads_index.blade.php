@extends('layouts.default_min')

@section('content')
<div class="row">
        <div class="placeholder100">
            <div class="col-md-8 col-lg-6 col-md-offset-3">
                <header>
                    <h3>Үнэгүй зар</h3>
                </header>
            </div>
        </div>
    <div class="col-md-3">
        <section class="card">
        <div class="margin-bottom30">
            <a href="/createad" class="btn btn-primary  btn-block" role="button">Зар оруулах</a>
        </div>        
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
        <div class="col-md-10 ads-list">

                @foreach($ads as $aads)
                    <div class="media ads">
                      <div class="media-left">
                        @if($aads->images()->count())
                            <a href="{{ route('ads_show_path', $aads->id) }}" >{!! Html::image("assets/ads/" . $aads->firstimage(), null, ['class'=>'width100']) !!}</a>
                        
                        @else
                            <a href="{{ route('ads_show_path', $aads->id) }}" >{!! Html::image("assets/ads/thumbs/130x90.jpg", null, []) !!}</a>
                        @endif

                      </div>
                      <div class="media-body" style="padding-left:10px;">
                        <div class="flex">
                            <h4 class="media-heading">{!! link_to_route('ads_show_path', $aads->title, $aads->id)!!}
                            <span class="pull-right price"><b>{{$aads->price }} ₮</b></span>
                            </h4>
                        </div>

                        {{ $aads->shorten(100)}} {!! link_to_route('ads_show_path', 'Дэлгэрэнгүй', $aads->id, ['class' => 'more'])!!}
                      </div>
                    </div>  


                @endforeach
                            <div class="textcenter">
                                {!! $ads->links() !!}         
                            </div>
        </div>


    </div>

</div>
                <div class="placeholder100"></div>

@stop

@section('script')
  <script>
    $("#ex2").slider({});  

    simpleCart({
      checkout: {
        type: "SendForm",
        email: "you@yours.com",
        url: "/checkout",
        method: "GET" ,
        success: "success"
      },


    });

  </script>
@stop