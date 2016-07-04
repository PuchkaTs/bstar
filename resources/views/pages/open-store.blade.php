@extends('layouts.default_min')

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">


        <div class="placeholder100 row" style="margin-top: 50px;">
            <div class="col-md-8 col-lg-6">
                <header>
                    <h3>Бидэнтэй холбогдох</h3>
                </header>
            </div>
        </div>
        <div class="row" id="projects" style="min-height: 500px">
            <div class="">
                <section class="row">
                    <h5>Утас: 76103080</h5>
                    <h5>Ц-Шуудан: info@babystar.mn</h5>
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
                    <!-- Submit form input -->
                    <div class="form-group">    
                        {!! Form::submit('Илгээх', ['class' => 'btn btn-primary btn-block'])!!}
                    </div>
                {!! Form::close() !!}
                </section>          
            @include('layouts.partials.middlebanner')
            @include('layouts.partials.bottombanner')

            </div>

        </div>        
    </div>
</div>

@stop
