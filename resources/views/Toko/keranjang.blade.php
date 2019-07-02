@extends('layouts.theme')
 @section('content')
	<div class="banner-top">
	<div class="container">
		<h3 >Keranjang</h3>
		<h4><a href="index.html">Home</a><label>/</label>Wishlist</h4>
		<div class="clearfix"> </div>
	</div>
	</div>

	<!-- contact -->
		<div class="check-out">	 
		<div class="container">	 
	 <div class="spec ">
				<h3>Wishlist</h3>
					<div class="ser-t">
						<b></b>
						<span><i></i></span>
						<b class="line"></b>
					</div>
			</div>
				<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cross').fadeOut('slow', function(c){
							$('.cross').remove();
						});
						});	  
					});
			   </script>
			<script>$(document).ready(function(c) {
					$('.close2').on('click', function(c){
						$('.cross1').fadeOut('slow', function(c){
							$('.cross1').remove();
						});
						});	  
					});
			   </script>	
			   <script>$(document).ready(function(c) {
					$('.close3').on('click', function(c){
						$('.cross2').fadeOut('slow', function(c){
							$('.cross2').remove();
						});
						});	  
					});
			   </script>	
 <table class="table ">
 <thead>
				
				<tr>
					
					<th class="t-head head-it ">Barang</th>
					<th class="t-head">Harga</th>
					<th class="t-head">Jumlah</th>
				
					
					
			</thead>
			<tbody>
				
				@foreach($barang as $brg)
				
				<tr class="cross">
				<td class="t-data ring-in">
			<div class="sed">
				<h5>{{$brg->name}}</h5>
			</div>
			<div class="clearfix"> </div>
							<div class="close2"> <i class="fa fa-times" aria-hidden="true"></i></div>
	</td>
					<td class="t-data">{{$brg->price}}</td>
					<td class="t-data"><div class="quantity"> 
								<div class="quantity-select">            
									<div class="entry value-minus">&nbsp;
									<a href="{{ $brg->rowId }}" class="btn kurangi-qty"><i class="icon-minus"></i></button>
									
									</div>
										<div class="entry value"><span class="span-1">{{$brg->qty}}</span></div>									
									<div class="entry value-plus">&nbsp;
									<a href="{{ $brg->rowId }}" class="btn add-qty"><i class="icon-plus"></i></a>
									</div>
								
							</div>
							
						</td>
					<td class="t-data t-w3l"><a class=" add-1" href="single.html">{{$brg->subtotal}}</a></td>
					
					
			</tr>
		</tr>
				@endforeach

			</tbody>
			
			
			
		</table>
		<a href="{{url('cekout/')}}" class="btn btn-danger my-cart-btn my-cart-b" data-id="35" data-name="Oats Idli" >Check-Out</a>
	@endsection
	@section('scripts') 				
		<!--quantity-->
		<script type="text/javascript">
		$(document).ready(function(){
					

			$('.add-qty').click(function(e){
				e.preventDefault();
				var rowId = $(this).attr('href');
				window.location.href = "{{url('cart-qty/update')}}"+'/'+rowId;
			});

			$('.kurangi-qty').click(function(e){
				e.preventDefault();
				var rowId = $(this).attr('href');
				window.location.href = "{{url('cart-qty/kurangi')}}"+'/'+rowId;
			});

					
				
		});
	</script>
@endsection