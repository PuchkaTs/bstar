<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="">Бэлэнээр</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2" data-whatever="">Картаар</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3" data-whatever="">Дансаар</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Бэлнээр захиалах</h4>

      </div>
      <div class="modal-body">
        <p>
          ЕРӨНХИЙ ЗААЛТ

Цахим худалдааны төв нь “Эй Пи Эм” ХХК-ны албан ёсны вэбсайт бөгөөд энэхүү үйлчилгээний нөхцөл нь уг онлайн салбараар үйлчлүүлэх, худалдан авалт хийхтэй холбоотой үүсэх харилцааг зохицуулахад оршино.

Хэрэглэгч худалдан авалт хийх, вэбсайтаар үйлчлүүлэхээсээ өмнө хүлээн зөвшөөрч баталгаажуулсны үндсэн дээр хэрэгжинэ.
2.  Энэхүү үйлчилгээний нөхцөлийн хэрэгжилтэнд “Эй Пи Эм” ХХК /цаашид байгууллага гэх/ болон хэрэглэгч /цаашид хэрэглэгч гэх/ хамтран хяналт тавина.
3.  apm.mn вэбсайт нь зөвхөн насанд хүрэгчдэд үйлчлэх ба насанд хүрээгүй хүүхэд эцэг эхийн хамт үйлчилгээний нөхцлийн дагуу худалдаа, үйлчилгээ авах боломжтой
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        <button type="button" class="btn btn-primary">Захиалга хийх</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Картаар захиалах</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url' => '/buy']) !!}
            <!-- card number form input -->
            <div class="form-group">
                {!! Form::label('card', 'Картын дугаар:') !!}
                {!! Form::text('card', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Хаяг form input -->
            <div class="form-group">
                {!! Form::label('address', 'Хаяг:') !!}
                {!! Form::text('address', null, ['class' => 'form-control']) !!}
            </div>
        {!! Form::close() !!}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        <button type="button" class="btn btn-primary">Захиалга хийх</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Дансаар захиалах</h4>
      </div>
      <div class="modal-body">
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
          <td>1234</td>
        </tr>
      </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Хаах</button>
        <button type="button" class="btn btn-primary">Захиалга хийх</button>
      </div>
    </div>
  </div>
</div>