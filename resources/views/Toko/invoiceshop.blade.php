@extends('layouts.theme')
@section('content')
<table class="table " style="width: 700px;">
 <thead>
				
				<tr>
					
					<th class="t-head head-it ">Barang</th>
					<th class="t-head">Jumlah</th>
					<th class="t-head">Harga</th>
					<th class="t-head">Total</th>
					
					
			</thead>
			<tbody>
				
				@foreach($barang as $index=>$brg)
				
				
					<td td class="t-data">{{$brg->name}}</td>
					<td class="t-data">{{$brg->price}}</td>
					<td class="t-data">{{$brg->qty}}
					<td class="t-data t-w3l"><a class=" add-1" href="single.html">{{$brg->subtotal}}</a></td>
					
					
			</tr>
				@endforeach
				<th class="t-data">{{$total}}</th>
			</tbody>
			
			
		</table>


@endsection