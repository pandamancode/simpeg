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
                    <a title="Cetak Slip Gaji" href="javascript:;" class="btn btn-primary btn-xs xtooltip btn-flat"><i class="fa fa-print fa-fw"></i></a>
                    <a title="Ubah" href="javascript:;" data-id="{{ $p->id_penggajian }}" class="btn btn-success btn-xs xtooltip btn-edit btn-flat"><i class="fa fa-edit fa-fw"></i></a>
                    <a title="Hapus" href="javascript:;" data-id="{{ $p->id_penggajian }}" class="btn btn-danger btn-xs xtooltip hapus-data btn-flat" data-toggle="modal" data-target="#konfirmasiHapus"><i class="fa fa-trash fa-fw"></i></a>
                </td>
                <td>
                    <span><strong>{{ $p->nik }}</strong><br><span style="color:red;font-size:13pt;"><strong>{{ $p->nama_pegawai}}</strong></span><br>{{ $p->bidang_kerja }}</span>
                </td>
                <td>{{ $p->gapok }}</td>
                <td>{{ $p->tunjangan }}</td>
                <td>{{ $p->potongan }}</td>
                <td>{{ $p->tunjangan + $p->gapok - $p->potongan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
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
</script>