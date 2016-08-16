@extends('layouts.default_min')

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">


        <div class="placeholder100 row" style="margin-top: 50px;">
            <div class="col-md-8 col-lg-6">
                <header>
                    @if($article)
                    <h3 class="article-title">{{ $article->title ? $article->title : 'Ажлын байр' }}</h3>
                    @else
                        <h3 class="article-title">Гарчиг</h3>
                    @endif
                </header>
            </div>
        </div>
        <div class="row" id="projects" style="min-height: 500px">
            @if($article)
                <section class="col-md-12">
                    <div class="articlephoto">
                        @if($article->photo)
                            {!! Html::image("assets/articles/$article->photo", '', ['class'=>''])!!}    
                        @endif     
                    </div>
                </section>
                <section class="col-md-12">
                    {!!$article->body!!}
                </section>
                <section class="col-md-12">
                    <div class="art_bottom_ph">
                        @if($article->photobottom)
                            {!! Html::image("assets/articles/$article->photobottom", '', ['class'=>''])!!}    
                        @endif     
                    </div>
                </section>
            @endif    
            <div class="col-md-12">
            <a href="/downloads/anket" class="btn btn-info"><i class="fa fa-cloud-download" aria-hidden="true" style="color:white;"></i>Анкет татах</a>
                
            </div>

            @include('layouts.partials.middlebanner')
            @include('layouts.partials.bottombanner')

        </div>        
    </div>
</div>

@stop
