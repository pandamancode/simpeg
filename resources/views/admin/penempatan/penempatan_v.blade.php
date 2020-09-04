@extends('_layouts/main')
@section('content')
<div class="box box-primary box-solid">
  <div class="box-header">
    <i class="fa fa-random fa-fw"></i>
    <h3 class="box-title">Penempatan</h3>
  </div>
  <div class="box-body">
    <div style="text-align:right; margin-top:10px; margin-bottom: 10px;">
        <a href="{{ url('/penempatan/add') }}" class="btn btn-primary"><i class="fa fa-plus-circle fa-fw"></i> Penempatan Baru</a>
    </div>
  		<div class="table-responsive">
		<table class="table table-hover" id="table">
			<thead class="table-header">
				<tr style="background-color:#3c8dbc; color:white;">
					<th width="5%">No.</th>
					<th width="15%">Option</th>
					<th>NIK</th>
					<th>Nama Pegawai</th>
          <th>Bidang Kerja</th>
					<th>Perusahaan Mitra</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php $no =1; ?>
				@foreach($penempatan as $p)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>
						<a href="{{ url('/penempatan/edit') }}/{{$p->id_penempatan}}" class="btn btn-primary btn-xs btn-update btn-flat xtooltip"> <i class="fa fa-edit fa-fw" style="color:#ffffff;" title="Ubah"></i> <span style="color:#ffffff;"></span></a>
						<a href="javascript:;" class="btn btn-success btn-xs btn-status btn-flat xtooltip" data-toggle="modal" data-target="#konfirmasiOff" data-id="{{ $p->id_penempatan }}"> <i class="fa fa-power-off fa-fw" style="color:#ffffff;" title="Non-Aktifkan"></i> <span style="color:#ffffff;"></span></a>
						<a href="javascript:;" class="btn btn-danger btn-xs hapus-data btn-flat xtooltip" data-toggle="modal" data-target="#konfirmasiHapus" data-id="{{ $p->id_penempatan }}"><i class="fa fa-trash fa-fw" style="color:#ffffff;" title="Hapus"></i>  <span style="color:#ffffff;"></span></a>
					</td>
					<td>{{ $p->nik }}</td>
					<td>{{ $p->nama_pegawai }}</td>
					<td>{{ $p->bidang_kerja }}</td>
          <td>{{ $p->nama_mitra }}</td>
					<td>{{ $p->status }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
  </div>
	</div>
</div>


<div id="tempat-modal"></div>

<div class="modal fade" id="konfirmasiHapus" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
        <h3 style="display:block; text-align:center;">Hapus Data Ini?</h3>
        <form method="POST" action="{{ url('/penempatan/hapus') }}">
		@csrf
          <input type="hidden" name="id_penempatan" id="id_">
          <div class="col-md-6">
            <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok-sign"></i> Ya, Hapus Data Ini</button>
          </div>
          <div class="col-md-6">
            <button class="form-control btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Tidak</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="konfirmasiOff" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
        <h3 style="display:block; text-align:center;">Non-Aktifkan Data Ini?</h3>
        <form method="POST" action="{{ url('/penempatan/nonaktif') }}">
		@csrf
          <input type="hidden" name="id_penempatan" id="id_off">
          <div class="col-md-6">
            <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok-sign"></i> Ya, Non-Aktifkan Data Ini</button>
          </div>
          <div class="col-md-6">
            <button class="form-control btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Tidak</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

	$('#penempatan').addClass('active');

	$(function () {
	    $("#table").dataTable({
	      "iDisplayLength": 10,
	    });
	    $('.xtooltip').tooltip(); 
	});


	//modal hapus
	$(document).on("click", ".hapus-data", function() {
		id = $(this).attr("data-id");
		$('#id_').val(id);
	})

	//modal hapus
	$(document).on("click", ".btn-status", function() {
		id = $(this).attr("data-id");
		$('#id_off').val(id);
	})
</script>

@if (session('status'))
<script>
swal({
        title: "Done",
        text: "{{session('status')}}",
        timer: 1500,
        showConfirmButton: false,
        type: "success"
    });
</script>
@endif

@if (session('warning'))
<script>
swal({
        title: "Warning",
        text: "{{session('warning')}}",
        timer: 1500,
        showConfirmButton: false,
        type: "error"
    });
</script>
@endif
@endsection