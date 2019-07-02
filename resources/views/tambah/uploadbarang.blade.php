@extends('layouts.theme')
@section('content')
<div class="banner-top">
	<div class="container">
		<h3 >UPLOAD BARANG</h3>
		<h4><a href="index.html">Home</a><label>/</label>Login</h4>
		<div class="clearfix"> </div>
	</div>
</div>
<div class="login">
	
		<div class="main-agileits">
				<div class="form-w3agile">
    <div class="modal-body">
			<form method="post" action="{{url('upload/barang')}}" enctype="multipart/form-data"> 
			{{csrf_field()}}
            <h2>Tambah Barang</h2>

        <div class="form-group">
					<label for="nama"> ID Baraang:</label>
					<input type="text" name="id_brg" class="form-control" id="barang" placeholder="Nama Barang">
			                </div>
        <div class="form-group">
					<label for="nama"> Barang :</label>
					<input type="text" name="barang" class="form-control" id="harga" placeholder="Harga">
			                </div>
        <div class="form-group">
					<label for="nama"> Harga :</label>
					<input type="text" name="harga" class="form-control" id="harga" placeholder="Harga">
			                </div>
         <div class="form-group">
					<label for="nama"> Jumlah :</label>
					<input type="text" name="jumlah" class="form-control" id="jumlah" placeholder="Jumlah">
                    </div>
        <div class="form-group">
					<label for="nama"> ID Kategori :</label>
					<input type="text" name="kategori" class="form-control" id="jumlah" placeholder="Jumlah">
                    </div>
        <div class="form-group">
					<label for="nama"> ID Status :</label>
					<input type="text" name="status" class="form-control" id="jumlah" placeholder="Jumlah">
                    </div>
        <div class="form-group">
					<label for="nama">upload :</label>
					<input type="file" name="file" class="form-control" id="harga" placeholder="Harga">
			                </div>
      
			
			<button type="submit" class="btn btn-succes" style="margin-left:38px">Tambah Produk</button>

			
</div>
</div>
</div>
			
@endsection
