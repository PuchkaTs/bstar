@extends('layouts.default_min')

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">


        <div class="placeholder100" style="margin-top: 50px;">
            <div class="">
                <header>
                    @if($article)
                    <h3 class="article-title">{{ $article->title ? $article->title : 'Гарчиг' }}</h3>
                    @else
                        <h3 class="article-title">Гарчиг</h3>
                    @endif
                </header>
            </div>
        </div>
        <div class="" id="projects" style="min-height: 500px">
            @if($article)
                <section class="row">
                    <div class="articlephoto">
                        @if($article->photo)
                            {!! Html::image("assets/articles/$article->photo", '', ['class'=>''])!!}    
                        @endif     
                    </div>
                </section>
                <section class="row">
                    <div class="col-md-12">
                        {!!$article->body!!}
                    </div>
                </section>
                <section class="row">
                    <div class="art_bottom_ph">
                        @if($article->photobottom)
                            {!! Html::image("assets/articles/$article->photobottom", '', ['class'=>''])!!}    
                        @endif     
                    </div>
                </section>
            @endif            
            @include('layouts.partials.middlebanner')
            @include('layouts.partials.bottombanner')

        </div>        
    </div>
</div>

@stop
