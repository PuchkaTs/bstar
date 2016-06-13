@extends('layouts.default_min')

@section('content')
<div class="row">
    <div class="col-md-3">
        <section class="card" style="margin-top:86px;">
            <h5 class="item_name">Ангилал:</h5>
 
            @if(! $currentUser)
                @include('layouts.partials.create_user')
            @endif  
                
            @if($currentUser)
                @include('layouts.partials.create_post')
            @endif                                                                                           
        </section>        
    </div>
    <div class="col-md-9">


        <div class="placeholder100 row" style="margin-top: 50px;">
            <div class="col-md-8 col-lg-6">
                <header>
                    <h3>Мэдээлэл</h3>
                </header>
            </div>
        </div>
        <div class="row" id="projects" style="min-height: 500px">
            <div class="">

            </div>

        </div>        
    </div>
</div>

@stop
