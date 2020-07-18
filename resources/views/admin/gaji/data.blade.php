<hr>
<div class="table-responsive">
    <div style="text-align:right; margin-top:10px; margin-bottom: 10px;">
        <button class="btn btn-primary btn-add"><i class="fa fa-plus-circle fa-fw"></i> Entry Gaji</button>
    </div>
    <table class="table table-bordered table-striped" id="table">
        <thead>
            <tr style="background-color:#3c8dbc; color:white;">
                <th class="text-center" width="5%">#</th>
                <th class="text-center" width="10%">Option</th>
                <th class="text-center">Pegawai</th>
                <th class="text-center">Gaji Pokok</th>
                <th class="text-center">Tunjangan</th>
                <th class="text-center">Potongan</th>
                <th class="text-center">Gaji Total</th>
            </tr>
        </thead>
        <tbody>
            <?php $no =1; ?>
			@foreach($gaji as $p)
            <tr>
                <td class="text-center">{{$loop->iteration}}</td>
                <td class="text-center" width="14%" style="vertical-align: middle;">
                    <a target="_blank" title="Cetak Slip Gaji" href="{{ url('gaji/slip') }}/{{ $p->id_penggajian }}" class="btn btn-primary btn-xs xtooltip btn-flat"><i class="fa fa-print fa-fw"></i></a>
                    <a title="Ubah" href="javascript:;" data-id="{{ $p->id_penggajian }}" class="btn btn-success btn-xs xtooltip btn-edit btn-flat"><i class="fa fa-edit fa-fw"></i></a>
                    <a title="Hapus" href="javascript:;" data-id="{{ $p->id_penggajian }}" class="btn btn-danger btn-xs xtooltip hapus-data btn-flat" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash fa-fw"></i></a>
                </td>
                <td>
                    <span><strong>{{ $p->nik }}</strong><br><span style="color:red;font-size:13pt;"><strong>{{ $p->nama_pegawai}}</strong></span><br>{{ $p->bidang_kerja }}</span>
                </td>
                <td>Rp. {{ format_rp($p->gapok) }}</td>
                <td>Rp. {{ format_rp($p->tunjangan) }}</td>
                <td>Rp. {{ format_rp($p->potongan) }}</td>
                <td>Rp. {{ format_rp($p->tunjangan + $p->gapok - $p->potongan) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="konfirmasiHapus" role="dialog">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
        <div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
        <h3 style="display:block; text-align:center;">Hapus Data Ini?</h3>
        <form method="POST" id="frm-hapus">
		@csrf
          <input type="hidden" name="id_penggajian" id="id_">
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
$(function () {
    $("#table").dataTable({
      "iDisplayLength": 10,
    });
        
    $('.xtooltip').tooltip(); 
});

$(document).on("click", ".btn-add", function() {
    var id = $(this).attr("data-id");

    $.ajax({
        method: "POST",
        url: "{{url('/gaji/add')}}",
        data: {
        "_token": "{{ csrf_token() }}",
        "id": id
        }
        //data: "id=" +id
    })
    .done(function(data) {
        $('#tempat-modal').html(data);
        $('#md-add').modal('show');
    })
})

$(document).on("click", ".btn-edit", function() {
    var id = $(this).attr("data-id");

    $.ajax({
        method: "POST",
        url: "{{url('/gaji/update')}}",
        data: {
        "_token": "{{ csrf_token() }}",
        "id": id
        }
        //data: "id=" +id
    })
    .done(function(data) {
        $('#tempat-modal').html(data);
        $('#md-update').modal('show');
    })
})

//modal hapus
$(document).on("click", ".hapus-data", function() {
    id = $(this).attr("data-id");
    $('#id_').val(id);
})

$('#frm-hapus').submit(function (event) {
    dataString = $("#frm-hapus").serialize();
    $.ajax({
        type:"POST",
        url:"{{url('/gaji/hapus')}}",
        data:dataString,
        success: function(msg){
            swal({
                title: "Done",
                text:"Hapus Data Gaji Berhasil",
                timer: 1500,
                showConfirmButton: false,
                type:"success",
            });
            $('#konfirmasiHapus').modal('hide');
            $('#btn_tampil').click();
        },
    });
    event.preventDefault();
});
</script>