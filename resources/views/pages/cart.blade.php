@extends('layouts/default_min')

@section('content')
	<div class="">
		<h3>Таны сагс</h3>
		<div class="cart_table cart">
			<div class="simpleCart_items">
				
			</div>

		</div>
		<hr>
			<div class="panel panel-default">
			  <!-- Default panel contents -->
			  <div class="panel-heading">Дүн</div>

			  <!-- Table -->
			  <table class="table">
				<tbody> 
					<tr> <th scope="row">Нийт бараа</th> <td><span class="simpleCart_quantity"></span> ширхэг</td> </tr>
					<tr> <th scope="row">Нийт дүн</th> <td><span class="simpleCart_total"></span></td> </tr> 
				</tbody>
			  </table>
			</div>
		<a href="javascript:;" class="btn btn-info btn-sm simpleCart_empty">Сагс шинэчлэх</a>
		<div class="placeholder50"></div>
		<div class="row margin15">
			<div class="col-md-6">
			{!! Form::open(['url' => 'foo/bar']) !!}
			    <!-- Утас form input -->
			    <div class="form-group">
			        {!! Form::label('phone', 'Утас:*') !!}
			        {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone']) !!}
			    </div>
			    <!-- Message form input -->
			    <div class="form-group">			    
			        {!! Form::label('address', 'Хаяг:*') !!}
			        {!! Form::textarea('address', null, ['class' => 'form-control', 'id' => 'address']) !!}
			    </div>
				<h3>Төлбөрийн нөхцөл:</h3>
<p>
1. Цахим худалдааны төв нь “Эй Пи Эм” ХХК-ны албан ёсны вэбсайт бөгөөд энэхүү үйлчилгээний нөхцөл нь уг онлайн салбараар үйлчлүүлэх, худалдан авалт хийхтэй холбоотой үүсэх харилцааг зохицуулахад оршино.
Хэрэглэгч худалдан авалт хийх, вэбсайтаар үйлчлүүлэхээсээ өмнө хүлээн зөвшөөрч баталгаажуулсны үндсэн дээр хэрэгжинэ.</p>
<p>2. Энэхүү үйлчилгээний нөхцөлийн хэрэгжилтэнд “Эй Пи Эм” ХХК /цаашид байгууллага
гэх/ болон хэрэглэгч /цаашид хэрэглэгч гэх/ хамтран хяналт тавина.</p>
<p>3. apm.mn вэбсайт нь зөвхөн насанд хүрэгчдэд үйлчлэх ба насанд хүрээгүй хүүхэд эцэг эхийн хамт үйлчилгээний нөхцлийн дагуу худалдаа, үйлчилгээ авах боломжтой
</p>					
			    <!-- agreement form input -->
			    <div class="form-group">
			        {!! Form::label('agreement', 'ҮЙЛЧИЛГЭЭНИЙ НӨХЦӨЛИЙГ ЗӨВШӨӨРӨХ*') !!}
			        {!! Form::checkbox('agreement', 'true', null); !!}
			    </div>		    
			{!! Form::close() !!}			
			</div>			
		</div>
		<div class="row margin15">
			<div class="col-md-6">
				<p>Таны захиалгын дугаар <div id="tnumber">{{ $transactionNumber }}</div></p>	
				<input type="hidden" v-model="method" id="method">
		    	@include('layouts.partials.buy')			
			</div>			
		</div>


		<div class="placeholder50"></div>



	</div>

@stop

@section('script')
	<script>
	  simpleCart({
	    checkout: {
	      type: "SendForm",
	      email: "you@yours.com",
	      url: "/checkout",
	      method: "GET" ,
	      success: "success",      
	    },
	    cartStyle : "table",

});

simpleCart.bind( 'beforeCheckout' , function( data ){
	var phone = document.getElementById('phone').value;
	var address = document.getElementById('address').value;
	var method = document.getElementById('method').value;
	var tnumber = document.getElementById('tnumber').innerHTML;
	var agreement = document.getElementById('agreement').checked;
	  data.phone = phone;
	  data.metod = method;
	  data.address = address;
	  data.transactionNumber = tnumber;	  
	  data.agreement = agreement;	  
	  data.totalPrice = simpleCart.total();
	  data.totalItems = simpleCart.quantity();
});	  

$('#paymentTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})

    new Vue({
        el: '#app',
        data: {
        	method: 'cash'
        },

        methods: {
        	methodCash: function(){
                this.method = "cash";
                console.log(this.method);
            },
        	methodCard: function(){
                this.method = "card";
                console.log(this.method);

            },
        	methodAccount: function(){
                this.method = "account";
                console.log(this.method);

            },                        
        }
    });
	</script>
@stop