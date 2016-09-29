@extends('layouts/default_min')
@section('meta')
    <title>{{ $anews->title }}</title>
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="Монголын анхны хүүхдийн бараа үйлчилгээ, зөвлөгөө мэдээллийн цогц сайт" />
    <meta property="og:description" content="{{ $anews->shorten(300) }}" />
    <meta property="og:image" content="https://babystar.mn/assets/news/{{$anews->photo}}" />
@stop
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-10 col-lg-offset-1 gheader">
            <header>
                <h3 class="news-title">{{ $anews->title }}</h3>
            </header>

        </div>
    </div>
<div class="row" id="projects" style="min-height: 500px">
    <div>
            <div class="col-md-12 col-lg-10 col-lg-offset-1" id="project_by_id">
                    <article>
                        <div>{!! Html::image("assets/news/$anews->photo", null, ['class'=>'width100']) !!}</div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <section class="text-content">
                                    {!! $anews->body !!}
                                    @include('layouts.partials.socialButtons')                                   
                                </section>
                            </div>
                        </div>

                    
                    </article>
            </div>
    </div>
        
</div>
<div class="placeholder"></div>
@stop