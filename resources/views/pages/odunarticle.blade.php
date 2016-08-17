@extends('layouts.default_min')

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="placeholder100 row">
            <div class="col-md-8 col-lg-6">
                <header>
                    @if($article)
                    <h3>{{ $article->title ? $article->title : 'Гарчиг' }}</h3>
                    @else
                        <h3>Гарчиг</h3>
                    @endif
                </header>
            </div>
        </div>
        <div class="row" id="projects" style="min-height: 500px">
            <div class="col-md-12">
            @if($article)
                <section class="">
                    <div class="articlephoto">
                        @if($article->photo)
                            {!! Html::image("assets/oduns/$article->photo", '', ['class'=>''])!!}    
                        @endif     
                    </div>
                </section>
                <section class="">
                    {!!$article->body!!}
                </section>
                <section class="">
                    <div class="art_bottom_ph">
                        @if($article->photobottom)
                            {!! Html::image("assets/oduns/$article->photobottom", '', ['class'=>''])!!}    
                        @endif     
                    </div>
                </section>
            @endif            
            @include('layouts.partials.middlebanner')
            @include('layouts.partials.bottombanner')
            </div>
        </div>        
    </div>
</div>

@stop
