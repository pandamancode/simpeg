@extends('_layouts/main')
@section('content')
<div class="box box-primary box-solid">
  <div class="box-header">
    <i class="fa fa-users fa-fw"></i>
    <h3 class="box-title">Manajemen Pengguna</h3>
  </div>
  <div class="box-body">
    <div style="text-align:right; margin-top:10px; margin-bottom: 10px;">
        <a href="{{ url('/users/register') }}" class="btn btn-primary"><i class="fa fa-plus-circle fa-fw"></i> Pengguna Baru</a>
    </div>
  		<div class="table-responsive">
		<table class="table table-hover" id="table">
			<thead class="table-header">
				<tr style="background-color:#3c8dbc; color:white;">
					<th width="5%">No.</th>
					<th width="10%">Option</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Level</th>
				</tr>
			</thead>
			<tbody>
				<?php $no =1; ?>
				@foreach($user as $p)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>
						<a href="{{ url('/users/edit') }}/{{$p->id}}" class="btn btn-primary btn-xs btn-update btn-flat xtooltip"> <i class="fa fa-edit fa-fw" style="color:#ffffff;" title="Ubah"></i> <span style="color:#ffffff;"></span></a>
						<a href="javascript:;" class="btn btn-danger btn-xs hapus-data btn-flat xtooltip" data-toggle="modal" data-target="#konfirmasiHapus" data-id="{{ $p->id }}"><i class="fa fa-trash fa-fw" style="color:#ffffff;" title="Hapus"></i>  <span style="color:#ffffff;"></span></a>
					</td>
					<td>{{ $p->name }}</td>
					<td>{{ $p->email }}</td>
					<td>{{ $p->level }}</td>
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
        <form method="POST" action="{{ url('/users/hapus') }}">
		@csrf
          <input type="hidden" name="id" id="id_">
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

<script type="text/javascript">

	$('#user').addClass('active');

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
@endsection