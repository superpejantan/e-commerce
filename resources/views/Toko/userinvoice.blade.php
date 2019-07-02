@extends('layouts.theme')
@section('content')
@include('layouts.headnav')

<table class="table table-striped">

 			<thead>
				
				<tr>
					
				
					<th class="t-head">nama</th>
					<th class="t-head">alamat</th>
					<th class="t-head">Total Pembayaran</th>
					<th class="t-head">Konfirmasi</th>
				</tr>
					
			</thead>

			
			
		</table>
</div>
	
		<a href="#" data-toggle="modal" data-target="#modal-edit" class="offer-img">
										<img src="images/of.png" class="img-responsive" alt="">
										<div class="offer"><p><span>Offer</span></p></div>
									</a>
  
<div class="modal modal-default fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span></button>
        <h4 class="modal-title">Edit Barang</h4>
      </div>
      <div class="modal-body">
        


      		<form role="form" action="{{ url('data/insert/rekam_medis') }}" method="POST">
      			{{ csrf_field() }}
            
              <div class="box-body">
              <input type="hidden" name="id" class="form-control" id="exampleInputEmail1">
            <div class="form-group">
                  <label for="exampleInputEmail1">Nama Pasien</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Barang">
                </div>
              </div>
			<div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Keluhan</label>
                  <input type="text"  name="keluhan" class="form-control" id="exampleInputEmail1" placeholder="keluhan">
								</div>
              </div>
			<div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Lama sakit</label>
                  <input type="text"  name="lama" class="form-control" id="exampleInputEmail1" placeholder="hari">
								</div>
              </div>
			<div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Diagnosa</label>
                  <input type="text"  name="diagnosa" class="form-control" id="exampleInputEmail1" placeholder="hari">
								</div>
              </div>
							<input type="text" name="poli" class="form-control" id="exampleInputEmail1">
							<input type="text" name="id_p" class="form-control" id="exampleInputEmail1">
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-fw fa-cart-plus"></i> Update</button>
              </div>
            </form>



      </div>
    </div>
    <!-- /.modal-content -->
	</div>
								</div>
								</div>
@endsection
@section('scripts')
	<script type="text/javascript">
		$(document).ready(function(){

			$('.table-striped').DataTable({
	       		 processing: true,
	        	serverSide: true,
	        	ajax: "{{url('data/pesanan')}}",
				columns: [
						{data: 'nama', name: 'nama'},
						{data: 'alamat', name: 'alamat'},
						{data: 'bayar', name: 'bayar'},
						{data: 'action', name: 'action', orderable: false, searchable: false}
					],
          					order: [ [0, 'asc'] ]
	   		});

			$('body').on('click','.btn-edit',function(e){
	    	

	    		$('#modal-edit').modal();
	    	h})
		
		})
		
	</script>
@endsection