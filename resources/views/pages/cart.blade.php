@extends('layouts/default_min')

@section('content')
	<div class="">
		<h3>Таны сагс</h3>
		<div class="cart_table">
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
		<h3>Төлбөрийн нөхцөл:</h3>	
    	@include('layouts.partials.buy')
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
	      success: "success"
	    },
	    cartStyle : "table",

});

simpleCart.$('.colorsselect').on('change', function(){
	    console.log('change');
	    var $this = $(this),
	        selected = $this.find(':selected').data('color')
	       
	    $this.siblings('.item_color').val(selected);  
});  


// BUY modal
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  // modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
$('#exampleModal2').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  // modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
$('#exampleModal3').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  // modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
	</script>
@stop