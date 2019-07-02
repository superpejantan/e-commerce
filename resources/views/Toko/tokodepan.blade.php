@extends('layouts.theme')
@section('content')
@include('layouts.headnav')
<div class="product">
		<div class="container">
			<div class="spec ">
                <h3>Products</h3>
				
				<div class="ser-t">
					<b></b>
					<span><i></i></span>
					
					<b class="line"></b>
				</div>
			</div>
			@foreach($barang as $brg)
			<div class=" tab-content tab-content-t ">
					<div class="tab-pane active text-style" id="tab1">
						<div class=" con-w3l">
							<div class="col-md-3 pro-1">
								<div class="col-m">	
									<a href="#" data-toggle="modal" data-target="#myModal2" class="offer-img">
										<img src="{{Storage::url($brg->path)}}" class="img-responsives" alt="">
									</a>
									<div class="mid-1">
										<div class="women">
											<h6><a href="single.html">{{$brg->barang}}</a>(5 kg)</h6>							
										</div>
										<div class="mid-2">
											<p ><em class="item_price">Rp.{{number_format($brg->harga)}}</em></p>
											  <div class="block">
												<div class="starbox small ghosting"> </div>
											</div>
											<div class="clearfix"></div>
										</div>
												<div class="add">
										   <a href="{{ url('add-toCart/'.$brg->id_barang) }}" class="btn btn-danger my-cart-btn my-cart-b"    data-image="images/of1.png">Add to Cart</a>
										</div>
									</div>
								</div>
							</div>
</div>
</div>
                        @endforeach
		</div>
	</div>
	
@endsection