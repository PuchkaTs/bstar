@extends('layouts/default_min')

@section('content')
<div style="z-index: 2;">
    <div class="simpleCart_shelfItem">
     
        <div class="row">
        <div class="placeholder100">
            <div class="col-md-8 col-lg-6 col-md-offset-3">
                <header>
                    <h3>{{$subTypeName}}</h3>
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
                    <h5 class="filter_item">Үнэ ₮:</h5>                      
                    <input id="ex2" type="text" class="span2" value="" data-slider-min="5000" data-slider-max="100000" data-slider-step="20" data-slider-value="[5000,50000]"/> 
                   

                    <h5 class="filter_item">Брэнд:</h5>
                    @foreach($brands as $brand)
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="age" value="option1">
                        {{$brand->name}}
                      </label>
                    </div>                    
                    @endforeach

                    <h5 class="filter_item">Нас:</h5>
                    @foreach($ages as $age)
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="age" value="option1">
                        {{$age->title}}
                      </label>
                    </div>                    
                    @endforeach  

                    <h5 class="filter_item">Хүйс:</h5>
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
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="gender" id="gender3" value="option3">
                        Хүү, Охин
                      </label>
                    </div>                      

                    <button type="submit" class="btn btn-primary btn-block">Хайх</button>                                                                                          
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