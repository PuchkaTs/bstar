@extends('layouts/default_min')

@section('content')
<div style="z-index: 2;">
    <div class="simpleCart_shelfItem">
     
        <div class="row">
        <div class="placeholder100">
            <div class="col-md-8 col-lg-6 col-md-offset-3">
                <header>
                    <h3>{{$subTypeName}} {{ (($count) ? '(' . $count . " бараа байна)" : '(Бараа олдсонгүй)')}}</h3>
                </header>
            </div>
        </div>    
            <div class="col-md-3">
                <section class="card">
                    <h5 class="filter_item">Ангилал:</h5>
                    <ul class="list-group">
                        @foreach($subtypes as $subtype)
                        <li class="list-group-item">{!!link_to_route('subtype_path', $subtype->name, $subtype->id)!!}</li>
                        @endforeach     
                    </ul> 

                    {!! Form::open(['route' => 'product_filter_path']) !!}
                    <h5 class="filter_item">Үнэ ₮:</h5>                      
                    <input id="ex2" type="text" class="span2" value="" data-slider-min="5000" data-slider-max="100000" data-slider-step="1000" data-slider-value="[5000,50000]"/> 
                   <span id="ex6CurrentSliderValLabel">Хайх үнийн дүн: <span id="ex6SliderVal">5000, 100.000</span></span>
                    <!-- price form input -->
                    <div class="form-group hidden">
                        {!! Form::label('price', 'price:') !!}
                        {!! Form::text('price', '0, 100000', ['class' => 'form-control', 'id' => 'price-slide']) !!}
                    </div>


                    <h5 class="filter_item">Брэнд:</h5>
                    @foreach($brands as $brand)
                    <div class="radio">
                      <label>
                        <input type="radio" name="brand" value="{{$brand->id}}">
                        {{$brand->name}}
                      </label>
                    </div>                    
                    @endforeach

                    <h5 class="filter_item">Нас:</h5>
                    @foreach($ages as $age)
                    <div class="radio">
                      <label>
                        <input type="radio" name="age" value="{{$age->id}}">
                        {{$age->title}}
                      </label>
                    </div>                    
                    @endforeach  

                    <h5 class="filter_item">Хүйс:</h5>
                    <div class="radio">
                      <label>
                        <input type="radio" name="gender" id="gender1" value="Хүү">
                        Хүү
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="gender" id="gender2" value="Охин">
                        Охин
                      </label>
                    </div>  
                    <div class="radio">
                      <label>
                        <input type="radio" name="gender" id="gender3" value="Хүү, Охин">
                        Хүү, Охин
                      </label>
                    </div>                     
                    <!-- Subtype ID form input -->
                    <div class="form-group hidden">
                        {!! Form::label('subtype_id', 'Subtype ID:') !!}
                        {!! Form::text('subtype_id', $id, ['class' => 'form-control']) !!}
                    </div>
                    <!-- Submit form input -->
                     <div class="form-group">    
                         {!! Form::submit('Хайх', ['class' => 'btn btn-primary btn-block'])!!}
                     </div>                         
                     {!! Form::close() !!}                                                                                        
                </section>
            </div>   

            <div class="col-md-9">   
                <div class="row">
                        <div>
                        @include('layouts.partials.topbanner')
                            <div class="row margin-bottom2em">
                                @foreach($products as $product)
                                    @include('layouts.partials.product-card3')

                                @endforeach

                            </div>
                                <div class="textcenter">
                                {!! $products->links() !!}                                
                                </div>                            
                            @include('layouts.partials.middlebanner')
                            @include('layouts.partials.reklam')
                            @include('layouts.partials.bottombanner')

                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<div class="placeholder50"></div>
@stop

@section('script')
  <script>
    $("#ex2").slider({});  
    $("#ex2").on("slide", function(slideEvt) {
    $("#price-slide").val(slideEvt.value);
    $("#ex6SliderVal").text(slideEvt.value);
});

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