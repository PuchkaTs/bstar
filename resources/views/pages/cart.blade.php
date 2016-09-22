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

            @if($errors->any())
                <ul class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif

			{!! Form::open(['url' => 'foo/bar']) !!}
			    <!-- Утас form input -->
			    <div class="form-group">
			        {!! Form::label('phone', 'Утас 1:*') !!}
			        {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone']) !!}
			    </div>
			    <!-- Утас 2 form input -->
			    <div class="form-group">
			        {!! Form::label('phone2', 'Утас 2:') !!}
			        {!! Form::text('phone2', null, ['class' => 'form-control', 'id' => 'phone2']) !!}
			    </div>			    
			    <!-- Message form input -->
			    <div class="form-group">			    
			        {!! Form::label('address', 'Хаяг:*') !!}
			        {!! Form::textarea('address', null, ['class' => 'form-control', 'id' => 'address']) !!}
			    </div>
				<h3>Төлбөрийн нөхцөл:</h3>
				<article class="service-condition">
					@if($condition)
					{!! $condition->body!!}
					@endif
				</article>					
			    <!-- agreement form input -->
			    <div class="form-group">
			        {!! Form::label('agreement', 'ҮЙЛЧИЛГЭЭНИЙ НӨХЦӨЛИЙГ ЗӨВШӨӨРӨХ*') !!}	
			    	<span style="float:left; margin-right:10px;">
			        	{!! Form::checkbox('agreement', 'true', 'null'); !!}
			    	</span>

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
	var phone2 = document.getElementById('phone2').value;
	var address = document.getElementById('address').value;
	var method = document.getElementById('method').value;
	var tnumber = document.getElementById('tnumber').innerHTML;
	var agreement = document.getElementById('agreement').checked;
	  data.phone = phone;
	  data.phone2 = phone2;
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
</script>
@stop