@extends('layouts.theme')
@section('content')
<div class="banner-top">
	<div class="container">
		<h3 >PEMBAYARAN</h3>
		<div class="clearfix"> </div>
	</div>
</div>
</br>
<a href="{{url('kembali')}}" class="btn btn-danger my-cart-btn my-cart-b" data-id="35" data-name="Oats Idli" >Kembali Belanja</a>
<div class="login">
	
		<div class="main-agileits">
				<div class="form-w3agile">
    <div class="row">
        <div class="col-25">
        <label for="fname"><h1>Penerima : </h1></label>
        </div>
        <div class="col-75">
            <h1>{{$nama_penerima}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-25">
        <label for="fname"><h1>Barang : </h1></label>
            </div>
        <div class="col-75">
        <h1> @foreach($keranjang as $brg){{$brg->name}}</br>@endforeach</h1>
        </div>
    </div>
                <br>
                <br>
                <div class="row">
        <div class="col-25">
        <label for="fname"><h1>Jumlah : </h1></label>
        </div>
        <div class="col-75">
            <h1>{{$jumlah}}</h1>
        </div>
    </div>
                
                <br>
                <br>
                <div class="row">
        <div class="col-25">
        <label for="fname"><h1>Alamat : </h1></label>
        </div>
        <div class="col-75">
            <h1>{{$alamat}}</h1>
        </div>
    </div>
                <br>
                <br>

                <div class="row">
        <div class="col-25">
        <label for="fname"><h1>Pengiriman : </h1></label>
        </div>
        <div class="col-75">
            <h1>Layanan: {{$cost}} Biaya: {{$biaya_ongkir}}</h1>
        </div>
    </div>

               
@endsection