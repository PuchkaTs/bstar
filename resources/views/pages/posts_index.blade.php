@extends('layouts.default_min')

@section('content')
<div class="row">
        <div class="placeholder100">
            <div class="col-md-8 col-lg-6 col-md-offset-3">
                <header>
                    <h3>Мэдээлэл</h3>
                </header>
            </div>
        </div>
    <div class="col-md-3">
        <section class="card">
            <h5 class="item_name">Ангилал:</h5>
            <ul class="list-group">
                @foreach($posttags as $posttag)
                <li class="list-group-item">{!!link_to_route('posts_path', $posttag->title, $posttag->id)!!}</li>
                @endforeach     
            </ul>  
            @if(! $currentUser)
                @include('layouts.partials.create_user')
            @endif  
                
            @if($currentUser)
                @include('layouts.partials.create_post')
            @endif                                                                                           
        </section>        
    </div>
    <div class="col-md-9">
        <div class="row posts" id="" style="min-height: 500px">
            <div class="">
                            @foreach($posts as $aposts)
                            <div class="col-md-6">
                                <article class="">
                                    <div class="post-thumb">
                                        <a href="{{ route('post_show_path', $aposts->id) }}" >{!! Html::image("assets/posts/" . ($aposts->photo ? $aposts->photo : "1.jpg"), null, ['class'=>'width100']) !!}</a>
                                    </div>
                                    <figcaption>
                                        <h4>{!! link_to_route('post_show_path', $aposts->title, $aposts->id)!!}</h4>

                                        <div><p>{{ $aposts->shorten(100)}} {!! link_to_route('post_show_path', 'Дэлгэрэнгүй', $aposts->id, ['class' => 'more'])!!}</p></div>
                                    </figcaption>
                                </article>                                
                            </div>
                            @endforeach
                            <div class="textcenter">
                                {!! $posts->links() !!}         
                            </div>
            </div>

        </div>        
    </div>
</div>

@stop
