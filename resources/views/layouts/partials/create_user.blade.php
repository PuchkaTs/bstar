<h3>Блог бичих</h3>
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
                {!! Form::label('birth', 'Хүүхдийн төрсөн он сар:') !!}
                {!! Form::date('birth', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
            </div>
            <!-- Нэр form input -->
            <div class="form-group">
                {!! Form::label('name', 'Нэр:') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <!-- Email form input -->
            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'нэр@жишээ.com']) !!}
            </div>
            <!-- Password form input -->
            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>       
            <!-- Password form input -->
            <div class="form-group">
                {!! Form::label('password_confirmation', 'Password:') !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
            </div>               
            <!-- Submit form input -->
            <div class="form-group">    
                {!! Form::submit('Бүргүүлээд блог бичих', ['class' => 'btn btn-primary btn-block'])!!}
            </div>            
        {!! Form::close() !!}