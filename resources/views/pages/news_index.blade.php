@extends('layouts.default_min')

@section('body')
<div class="placeholder100 row" style="margin-top: 50px;">
    <div class="col-md-8 col-lg-6 col-lg-offset-2 gheader">
        <header>
            <h3>{{ $title }}</h3>
        </header>

    </div>
</div>
<div class="row" id="projects" style="min-height: 500px">
    <div class="col-md-8 col-lg-6 col-lg-offset-2">
            <div class="col-md-12" style="padding: 35px 20px; margin-bottom: 45px;">
                            @include('layouts.partials.topbanner')

                    @foreach($news as $anews)
                        @if($anews->id == $latestId)
                        <article class="col-md-12">
                            <a href="{{ route('news_show_path', $anews->id) }}" >{!! Html::image("assets/news/$anews->photo", null, ['class'=>'width100']) !!}</a>
                            <figcaption>
                                <h4 class="news-title">{!! link_to_route('news_show_path', $anews->shortentitle(), $anews->id)!!}</h4>

                                <div><p>{{ $anews->shorten(100)}} {!! link_to_route('news_show_path', 'Дэлгэрэнгүй ', $anews->id, ['class' => 'more'])!!}</p></div>
                            </figcaption>
                        </article>                            
                        @else
                        <div class="col-md-6">
                            <article >
                                <a href="{{ route('news_show_path', $anews->id) }}" >{!! Html::image("assets/news/thumbs/$anews->photo", null, ['class'=>'width100']) !!}</a>
                                <figcaption>
                                    <h4 class="news-title">{!! link_to_route('news_show_path', $anews->shortentitle(70), $anews->id)!!}</h4>

                                    <div><p>{{ $anews->shorten(100)}} {!! link_to_route('news_show_path', 'Дэлгэрэнгүй ', $anews->id, ['class' => 'more'])!!}</p></div>
                                </figcaption>
                            </article>                            
                        </div>
                        @endif
                    @endforeach
                    <div style="text-align: center"></div>
                                <div class="textcenter">
                                {!! $news->links() !!}                                
                                </div>                              

            </div>
    </div>

    <div class="col-md-4 col-lg-2">
        <h5 class="item_name">Ангилал:</h5>
        <ul class="list-group">
            @foreach($tags as $tag)
            <li class="list-group-item">{!!link_to_route('news_path', $tag->title, ['tag'=>$tag->id])!!}</li>
            @endforeach     
        </ul> 
    </div>

</div>
@stop
