@extends('layouts.default_min')

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">


        <div class="placeholder100 row" style="margin-top: 50px;">
            <div class="">
                <header>
                    <h3>Бидэнтэй холбогдох</h3>
                </header>
            </div>
        </div>
        <div class="row" id="projects" style="min-height: 500px">
            <div class="">
                <section class="row">
                    <h4>Утас: 76103080</h4>
                    <h5>Ц-Шуудан: info@babystar.mn</h5>
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

        </div>  
            @include('layouts.partials.middlebanner')
            @include('layouts.partials.bottombanner')  
    </div>

</div>

@stop
