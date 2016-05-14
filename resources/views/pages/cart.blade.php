@extends('layouts/default_min')

@section('content')
	<div class="col-md-8 col-lg-6 col-lg-offset-2">
		<h3>Таны сагс</h3>
		<div class="cart_table">
			<div class="simpleCart_items">
				
			</div>
<span class="simpleCart_quantity"></span> items - <span class="simpleCart_total"></span>
<a href="javascript:;" class="simpleCart_checkout">Checkout</a>
		</div>
		
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
	      success: "success"
	    },
	    cartStyle : "table",


	  });

	</script>
@stop