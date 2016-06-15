@inject('tag', 'App\Tagpost')

<div class="row" id="projects" style="min-height: 500px">
    <div class="col-md-12">
            <h3>Блог бичих</h3>
            @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif            
    {!! Form::open(['url' => '/blogs']) !!}

        <!-- Гарчиг form input -->
        <div class="form-group">
            {!! Form::label('title', 'Гарчиг:') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Message form input -->
        <div class="form-group">
            {!! Form::label('body', 'Агуулга:') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tag', 'Төрөл:') !!}
            {!! Form::select('tag', $tag->tagnames(), null, ['class'=>'form-control']); !!}
        </div>          
        
        <!-- Submit form input -->
        <div class="form-group">
            {!! Form::label('file', 'Ковер зураг сонгох:') !!}
            {!! Form::file('photo'); !!}
        </div>          


        <div class="form-group">    
            {!! Form::submit('Илгээх', ['class' => 'btn btn-primary btn-block'])!!}
        </div>

    {!! Form::close() !!}
    </div>
</div>