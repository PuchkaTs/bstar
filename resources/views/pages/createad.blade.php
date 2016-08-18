@extends('layouts.default_min')

@section('css')
    <link rel="stylesheet" href="/css/dropzone.css">
@stop

@section('content')
<div class="row" style="">


    <div class="col-md-8 col-md-offset-2" id="ads" style="min-height: 500px">
        <header>
            <h3 style="padding:15px;">Зар оруулах</h3>
        </header>
        <div class="col-md-12 white_background">
            @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
            {!! Form::open(['url' => 'createad']) !!}

                <div class="form-group">
                    {!! Form::label('adstag', 'Төрөл:') !!}
                    {!! Form::select('adstag', $tagnames, null, ['class'=>'form-control']); !!}
                </div>   

                <!-- Гарчиг form input -->
                <div class="form-group">
                    {!! Form::label('title', 'Гарчиг:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>              

                <!-- Message form input -->
                <div class="form-group">
                    {!! Form::label('description', 'Дэлгэрэнгүй:') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                </div>

                <!-- Үнэ form input -->
                <div class="form-group">
                    {!! Form::label('price', 'Үнэ:') !!}
                    {!! Form::text('price', null, ['class' => 'form-control']) !!}
                </div>

                <!-- gender form input -->   
                <div class="radio">
                  <label>
                    <input type="radio" name="gender" value="Хүү" checked>
                    Эрэгтэй
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="gender"  value="Охин">
                    Эмэгтэй
                  </label>
                </div>

                <!-- Нас form input -->
                <div class="form-group">
                    {!! Form::label('age', 'Нас:') !!}
                    {!! Form::select('age', $ages, 1, ['class'=>'form-control']); !!}
                </div>    

                <!-- Утас form input -->
               <div class="form-group">
                   {!! Form::label('phone', 'Утас:') !!}
                   {!! Form::text('phone', null, ['class' => 'form-control']) !!}
               </div>    

                <!-- Байршил form input -->
                <div class="form-group">
                    {!! Form::label('location', 'Байршил:') !!}
                    {!! Form::select('location', $locations, 1, ['class'=>'form-control']); !!}
                </div>    
                <h3>Үйлчилгээний нөхцөл:</h3>
                <article class="service-condition">
                  @if($condition)
                  {!! $condition->body!!}
                  @endif
                </article>          
                <div class="form-group">
                    {!! Form::label('agreement', 'ҮЙЛЧИЛГЭЭНИЙ НӨХЦӨЛИЙГ ЗӨВШӨӨРӨХ*') !!} 
                    {!! Form::checkbox('agreement', 'true', 'false'); !!}
                </div>                     

                <!-- Submit form input -->
                <div class="form-group">    
                    {!! Form::submit('Оруулах', ['class' => 'btn btn-primary btn-block'])!!}
                </div>                        
            {!! Form::close() !!}
            <h2>Зураг оруулах</h2>
            <form action="/ads/photos"
                  class="dropzone"
                  id="my-awesome-dropzone">
            {{csrf_field()}}
            </form>
            <div class="placeholder100"></div>

        </div>


    </div>
</div>
@stop

@section('script')
    <script src="/js/dropzone.js"></script>
    <script>
        Dropzone.options.myAwesomeDropzone = {
          paramName: "file", // The name that will be used to transfer the file
          maxFilesize: 2, // MB
          dictDefaultMessage: 'Зураг оруулах хэсэг / зургаа чирээд, энд шид /',
          dictFallbackMessage: 'Таны хөтөч зураг хуулахыг дэмжихгүй байна',
          maxFiles: 4,
          acceptedFiles: '.jpg, .jpeg, .png',
          dictMaxFilesExceeded: 'Нэг зар дээр хамгийн ихдээ 4 зураг оруулах боломжтой',
          accept: function(file, done) {
            if (file.name == "justinbieber.jpg") {
              done("Naha, you don't.");
            }
            else { done(); }
          }
        };  
    </script>
  
@stop