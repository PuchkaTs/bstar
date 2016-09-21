@extends('layouts/default_min')
@section('meta')
    <title>{{ $anews->title }}</title>
    <meta property="og:url" content="http://shiid.mn">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Намууд юу хийх вэ? Сонгууль 2016. Зөв Шийд ">
    <meta property="og:site_name" content="Shiid.mn">
    <meta property="og:description" content="Shiid.mn сайтын зорилго нь 2016 оны УИХ-ын сонгуулд нэр дэвшиж буй 
                намуудын мөрийн хөтөлбөрүүдийг танилцуулах,
                 улмаар хооронд нь харьцуулж иргэн таны сонголтыг
                  мэргэн байлгахад оршино.">
    <meta property="og:image" content="http://shiid.mn/assets/design/og_image_shiidmn.jpg">
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
                                </section>
                            </div>
                        </div>
                    <div class="fb-share-button" data-href="{{Request::url()}}" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.babystar.mn%2F&amp;src=sdkpreparse">Share</a></div>                                         
                    </article>
            </div>
    </div>
        
</div>
<div class="placeholder"></div>
@stop