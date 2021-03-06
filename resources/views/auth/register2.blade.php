@extends('layouts.default_min')

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">


        <div class="placeholder100 row" style="margin-top: 50px;">
            <div class="col-md-8 col-lg-6">
                <header>
                    <h3>Бүртгэл</h3>
                </header>
            </div>
        </div>
        <div class="row" id="projects" style="min-height: 500px">
            <div class="">
            @if($article)
                <section class="row">
                    <div class="articlephoto">
                        @if($article->photo)
                            {!! Html::image("assets/articles/$article->photo", '', ['class'=>''])!!}    
                        @endif     
                    </div>
                </section>
            @endif
            @if(! $currentUser)            
                @if($errors->any())
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif        
                {!! Form::open(['url' => '/register']) !!}
                    <!-- Birth date form input -->
                    <div class="form-group">
                        {!! Form::label('birth', 'Таны төрсөн он сар:') !!}
                        {!! Form::date('birth', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                    </div>
                    <!-- Нэр form input -->
                    <div class="form-group">
                        {!! Form::label('name', 'Нэр:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <!-- Email form input -->
                    <div class="form-group">
                        {!! Form::label('email', 'Ц-шуудан:') !!}
                        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'нэр@жишээ.com']) !!}
                    </div>
                    <!-- Phone form input -->
                    <div class="form-group">
                        {!! Form::label('phone', 'Утас:') !!}
                        {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => '99887766']) !!}
                    </div>                      
                    <!-- Password form input -->
                    <div class="form-group">
                        {!! Form::label('password', 'Нууц үг:') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>       
                    <!-- Password form input -->
                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'Нууц үг:') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    </div>               
                    <!-- Submit form input -->
                    <div class="form-group">    
                        {!! Form::submit('Бүртгүүлэх', ['class' => 'btn btn-primary'])!!}
                    </div>            
                {!! Form::close() !!}
            @endif
            @if($article)
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
</div>

@stop
