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
			        {!! Form::label('phone', 'Утас:') !!}
			        {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone']) !!}
			    </div>
			    <!-- Message form input -->
			    <div class="form-group">
			        {!! Form::label('address', 'Хаяг:') !!}
			        {!! Form::textarea('address', null, ['class' => 'form-control', 'id' => 'address']) !!}
			    </div>
			{!! Form::close() !!}			
			</div>			
		</div>
		<div class="row margin15">
			<div class="col-md-6">
				<h3>Төлбөрийн нөхцөл:</h3>
				<p>Таны захиалгын дугаар <div id="tnumber">{{ $transactionNumber }}</div></p>	
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
	var tnumber = document.getElementById('tnumber').innerHTML;
	  data.phone = phone;
	  data.address = address;
	  data.transactionNumber = tnumber;	  
	  data.totalPrice = simpleCart.total();
	  data.totalItems = simpleCart.quantity();
});	  

$('#paymentTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})

	</script>
@stop