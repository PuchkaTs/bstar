@extends('layouts.default_min')

@section('content')
<div class="row">
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
    <div class="col-md-6 col-md-offset-3">
        <div>
                <header>
                    <h3>Бидэнтэй холбогдох</h3>
                </header>
        </div>
        <div class="row" id="projects" style="min-height: 500px">
       
                <section class="col-md-12">
                    <h4>Компани: Бэйби Стар ХХК /Baby Star LLC/</h4>
                    <h4>Утас: 76103080</h4>
                    <h4>Хаяг: Чингэлтэй дүүрэг, 3-р хороо, 2-р 40 мянгат, 29-45 тоот. </h4>
                    <h5>Мэйл: info@babystar.mn</h5>
                    <p>Бидэнтэй хамтран ажиллахыг хүссэн хэн бүхэнд бидний үүд хаалга нээлттэй байх болно.</p>
                    <p>* хэсгийг заавал бөглөнө үү</p>
                    @include('layouts.partials.errors')
                {!! Form::open(['url' => '/open-store']) !!}
                    <!-- Нэр form input -->
                    <div class="form-group">
                        {!! Form::label('name', 'Нэр:*') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <!-- Утас form input -->
                    <div class="form-group">
                        {!! Form::label('phone', 'Утас:*') !!}
                        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                    </div>
                    <!-- Ц-Шуудан form input -->
                    <div class="form-group">
                        {!! Form::label('email', 'Ц-Шуудан:') !!}
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    </div>
                    <!-- Message form input -->
                    <div class="form-group">
                        {!! Form::label('body', 'Захиа:') !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Бидэнтэй хамтран ажиллах...']) !!}
                    </div>
                    <!-- Submit form input -->
                    <div class="form-group">    
                        {!! Form::submit('Илгээх', ['class' => 'btn btn-primary btn-block'])!!}
                    </div>
                {!! Form::close() !!}
                </section>          

        </div>  
            @include('layouts.partials.middlebanner')
            @include('layouts.partials.bottombanner')  
    </div>

</div>

@stop
