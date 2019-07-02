@extends('layouts.theme')
@section('content')
@include('layouts.headnav')
<div class="blog-kiri">
	<div class="modal-body">
			<form method="post" action="{{url('bayar')}}">
			{{csrf_field()}}
            <h2>Pengiriman Pesanan</h2>
            <div class="form-group" style="width: 350px;">
					<label for="nama"> nama :</label>
					<input type="text" name="nama" class="form-control" id="inputFname" value="{{$nama}}" placeholder="Nama Penerima">
			</div>
		
			<div class="control-group" style="width: 350px;">
				<label for="jenis"> Kota Tujuan :</label>
                <input type="text" class="form-control" name="tujuan" value="{{$destination}}">
			</div>
			<div class="form-group" style="width: 350px;">
				<label class="control-group"  for="jenis"> Alamat:</label>
					<input type="text" placeholder="Jalan...Kecamatan...Desa...Rt/Rw"class="form-control" name="alamat" value="{{$alamat}}">
					</div>
			<div class="form-group" style="width: 350px;">
				<label for="no telepon">No Hp/Telepon :</label>
					<input type="text" class="form-control" name="no_hp" value="{{$no}}">
				</div>
				<div class="form-group" style="width: 350px;">
				<label for="no telepon">Nama Rekening :</label>
					<input type="text" class="form-control" name="nama_rek" placeholder="nama rekening">
				</div>

				<div class="control-group" style="width: 350px;">
				<label for="jenis"> Transfer ke :</label>
				<select id="destination" class="form-control" name="bank">
                    <option selected="selected" value="">Pilih Bank</option>
                    @foreach($bank as $b)
                    <option value="{{$b->id}}">{{ $b->bank }}</option>
                    @endforeach
                  </select>
			</div>
				<div class="form-group" style="width: 350px;">
				<label for="no telepon">berat :</label>
					<input type="text" class="form-control" value="{{$berat}}" name="weight">
				</div>
	</div>
</div>


<div class="blog-kanan">
              <table class="table table-hover">
                <thead>
                <tr>
                  <th>Nama Layanan</th>
                  <th>Tarif</th>
                  <th>ETD (Estimates Days)</th>
                </tr>
                </thead>
                <tbody>
            <tr>    <?php for($i=0; $i<count($array_result["rajaongkir"]["results"][0]["costs"]); $i++){ ?>
				<td><div class="form-group">
				<label for="no telepon">Paket : </label>
				<input type="checkbox" name="cost" value="<?php echo $array_result["rajaongkir"]["results"][0]["costs"][$i]["service"] ?>"><?php echo $array_result["rajaongkir"]["results"][0]["costs"][$i]["service"] ?>
				</div></td>
				<td><div class="form-group">
				<label for="no telepon">Biaya :</label>
				<input type="checkbox" name="ongkir" value="<?php echo $array_result["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["value"] ?>"><?php echo $array_result["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["value"] ?>
				</div></td>
				<td><div class="form-group">
				<label for="no telepon">Estimasi :</label>
				<input type="checkbox" name="waktu" value="<?php echo $array_result["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["etd"] ?>"><?php echo $array_result["rajaongkir"]["results"][0]["costs"][$i]["cost"][0]["etd"] ?>
				</div></td> 
				</tr>      
                  <?php } ?>
        </table>
		<button type="submit" class="btn btn-succes" style="margin-left:38px; size: 30px;">Submit</button>
			</div>
			

			
			
				
	</div>
			</div>


@endsection