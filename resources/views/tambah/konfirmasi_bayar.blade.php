@extends('layouts.theme')
@section('content')
<div class="banner-top">
	<div class="container">
		<h3 >KONFIRMASI PEMBAYARAN</h3>
		<h4><a href="index.html">Home</a><label>/</label>Login</h4>
		<div class="clearfix"> </div>
	</div>
</div>
<div class="login">
	
		<div class="main-agileits">
				<div class="form-w3agile">
    <div class="modal-body">
			<form method="post" action="{{url('konfirmasi/pembayaran')}}" enctype="multipart/form-data"> 
			{{csrf_field()}}
            <h2>Tambah Barang</h2>

        <div class="form-group">
					<label for="nama"> ID Baraang:</label>
					<input type="text" name="id_pesanan" class="form-control" id="barang" placeholder="kode pemesanan">
			                </div>
        
        <div class="form-group">
					<label for="nama"> Jumlah Pembayaran :</label>
					<input type="text" name="bayar" class="form-control" id="jumlah" placeholder="Rp.0000">
                    </div>
        <div class="form-group">
					<label for="nama">upload :</label>
					<input type="file" name="file" class="form-control" id="harga" placeholder="struk pembayaran">
			                </div>
      
			
			<button type="submit" class="btn btn-succes" style="margin-left:38px">Tambah Produk</button>

			
</div>
</div>
</div>
			
@endsection
