@extends('layouts.default_min')

@section('body')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h3>Hello Super Admin!</h3>

        {!! Form::open(['url' => 'ncst']) !!}

        <!-- Password form input -->
        <div class="form-group">
            {!! Form::label('password', 'Password:')!!}
            {!! Form::password('password', ['class' => 'form-control', 'required' => 'required'])!!}
        </div>

        <!-- Submit form input -->
        <div class="form-group">
            {!! Form::submit('Sign In', ['class' => 'btn btn-primary'])!!}
        </div>

        {!! Form::close() !!}
    </div>
</div>

<!--    place holder-->
<div style="height: 500px; width: 100%"></div>
@stop