<div>

  <!-- Nav tabs -->
  <ul id="paymentTabs" class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Бэлнээр</a></li>
    <li role="presentation"><a href="#paybycard" aria-controls="paybycard" role="tab" data-toggle="tab">Картаар</a></li>
    <li role="presentation"><a href="#payincash" aria-controls="payincash" role="tab" data-toggle="tab">Дансаар</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
        <p>Бэлнээр хэрхэн авах вэ?</p>

        <a href="javascript:;" class="simpleCart_checkout btn btn-primary">Захиалга хийх</a>   
    </div>
    <div role="tabpanel" class="tab-pane" id="paybycard">
        {!! Form::open(['url' => '/test']) !!}    
            
            <!-- username number form input -->
            <div class="form-group">
                {!! Form::label('username', 'Нэр:') !!}
                {!! Form::text('username', null, ['class' => 'form-control']) !!}
            </div>                               

            <!-- Нууцлал form input -->
            <div class="form-group">
                {!! Form::label('password', 'Нууц үг:') !!}
                {!! Form::text('password', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Submit form input -->
            <div class="form-group">    
                {!! Form::submit('Үргэлжлүүлэх', ['class' => 'btn btn-primary btn-block'])!!}
            </div>
        {!! Form::close() !!}
    </div>
    <div role="tabpanel" class="tab-pane" id="payincash">
      <table class="table table-hover table-bordered">
        <tr>
          <td>Дансны дугаар</td>
          <td><p>Хаан банк 5003790996</p><p>Голомт банк 5003790996</p><p>ХХБ банк 5003790996</p></td>
        </tr>
        <tr>
          <td>Хүлээн авагч</td>
          <td>Babystar ХХК</td>
        </tr>
        <tr>
          <td>Гүйлгээний дугаар</td>
          <td>{{$transactionNumber}}</td>
        </tr>
      </table>  
          <p>Дансаар төлбөр хийх заавар</p>

        <a href="javascript:;" class="simpleCart_checkout btn btn-primary">Захиалга хийх</a>
    </div>
  </div>

</div>