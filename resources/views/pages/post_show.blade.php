@extends('layouts/default_min')

@section('body')
    <div class="placeholder100 row" style="margin-top: 50px;">
        <div class="col-md-8 col-lg-6 col-lg-offset-2 gheader">
            <header>
                <h3>{{ $post->title }}</h3>

            </header>

        </div>
    </div>
<div class="row" id="projects" style="min-height: 500px">
    <div class="col-md-8 col-lg-6 col-lg-offset-2">
            <div class="col-md-12" id="project_by_id">
                    <article>
                    <div>{!! Html::image("assets/posts/$post->photo", null, ['class'=>'width100']) !!}</div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <section class="text-content">
                                {!! $post->body !!}
                            </section>
                        </div>
                    </div>
                    </article>

            </div>
    </div>
    <div class="col-md-4 col-lg-2">
            @if(! $currentUser)
                @include('layouts.partials.create_user')
            @endif  
                
            @if($currentUser)
                @include('layouts.partials.create_post')
            @endif    
        
    </div>
</div>
<div class="placeholder"></div>
@stop