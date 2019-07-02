@extends('layouts.theme');
@section('content')
<body>
<div class="modal-body">
			<form method="post" action="{{url('biaya_kirim')}}">
			{{csrf_field()}}
            <h2>Tambah Barang</h2>
            <div class="form-group">
					<label for="nama"> nama :</label>
					<input type="text" name="nama_penerima" class="form-control" id="inputFname" placeholder="Nama Penerima">
			</div>
		
			<div class="control-group">
				<label for="jenis"> Kota Tujuan :</label>
				<select id="destination" class="form-control" name="destination">
                    <option selected="selected" value="">Pilih Destination</option>
                    @foreach($kota as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                  </select>
			</div>
			<div class="form-group">
				<label class="control-group" for="jenis"> Alamat:</label>
					<input type="text" placeholder="Jalan...Kecamatan...Desa...Rt/Rw"class="form-control" name="alamat">
					</div>
			<div class="form-group">
				<label for="no telepon">No Hp/Telepon :</label>
					<input type="text" class="form-control" name="no_hp">
				</div>
			
				<div class="form-group">
				<label for="no telepon">berat :</label>
					<input type="text" class="form-control" name="weight">
				</div>
			
			<button type="submit" class="btn btn-succes" style="margin-left:38px">Tambah Produk</button>

			
				</div>
</body>

@endsection