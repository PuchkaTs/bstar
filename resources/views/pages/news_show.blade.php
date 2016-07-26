@extends('layouts/default_min')

@section('content')
    <div class="placeholder100 row" style="margin-top: 50px;">
        <div class="col-md-12 col-lg-10 col-lg-offset-1 gheader">
            <header>
                <h3>{{ $anews->title }}</h3>

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
                    </article>
            </div>
    </div>
        
</div>
<div class="placeholder"></div>
@stop