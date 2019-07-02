@extends('layouts.theme')
@section('content')
<table class="table ">
 <thead>
				
				<tr>
					
					<th class="t-head head-it ">Barang</th>
					<th class="t-head">detail</th>
					<th class="t-head">harga</th>
					<th class="t-head">sisa</th>
					
					
			</thead>
			<tbody>
				
				
				
				
					<td td class="t-data">{{$barang->barang}}</td>
					<td class="t-data">{{$barang->detail}}</td>
					<td class="t-data">{{$barang->harga}}</td>
					<td class="t-data">{{$barang->sisa}}</td>
					
					
			</tr>
				

			</tbody>
			
			
		</table>
		<a href="{{ url('/beli_lsg') }}" class="btn btn-danger my-cart-btn my-cart-b" data-id="35" data-name="Oats Idli" data-summary="summary 35" data-price="0.80" data-quantity="1" data-image="images/of35.png" 

@endsection