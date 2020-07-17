<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="myModalLabel"><i class="fa fa-tag fa-fw"></i> Entry Gaji Pegawai</h4>
</div>

<form method="post" id="frm-input">
  <div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">
  <!--Cek Data-->
    
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <td width="35%">Nama Pegawai</td>
            <td width="65%">
                <select name="pegawai" id="pegawai_select" class="form-control pegawai_select" style="width:100%">
                    <option value="" disabled selected>Pilih Pegawai</option>
                    @foreach($pegawai as $p):
                    <option value="{{ $p->nik }}">{{ $p->nama_pegawai }} ({{$p->nik}})</option>
                    @endforeach
                </select>
            </td>
        </tr>
        </thead>
        <tbody id="data"></tbody>
    </table>

  </div>
  <div class="modal-footer">
    @csrf
    <button type="button" onclick="simpan()" class="btn btn-primary btn-simpan"><i class="fa fa-check-square fa-fw"></i> Simpan</button>
    <button type="button" class="btn btn-danger " data-dismiss="modal"> <i class="fa fa-close fa-fw"></i>Close</button>
  </div>
</form>

<script>
$('.pegawai_select').select2();

$('#pegawai_select').on('change', function() {
    dataString = $("#frm-input").serialize();
    $.ajax({
        type:"POST",
        url:"{{url('/gaji/data_gaji')}}",
        data:dataString,
        beforeSend:function(){
          $("#data").html('<img src="{{url('assets/loading-spinner-blue.gif')}}"/><span> Loading...</span>');
        },
        success: function(msg){
            $('#data').html(msg);
        },
    });
    event.preventDefault();
});

function simpan(){
    dataString = $("#frm-input").serialize();
    $.ajax({
        type:"POST",
        url:"{{url('/gaji/entry')}}",
        data:dataString,
        success: function(msg){
            if(msg=='success'){
                swal({
                    title: "Done",
                    text:"Entry Data Gaji Berhasil",
                    timer: 1500,
                    showConfirmButton: false,
                    type:"success",
                });
            }else if(msg=='warning'){
                swal({
                    title: "Gagal",
                    text:"Data Gaji Sudah Ada",
                    timer: 1500,
                    showConfirmButton: false,
                    type:"error",
                });
            }
            $('#md-add').modal('hide');
            $('#btn_tampil').click();
        },
    });
    event.preventDefault();
}

$(document).on('keydown', 'body', function(e){
    var charCode = ( e.which ) ? e.which : event.keyCode;
    if(charCode == 13) //ENTER
    {
        $('.btn_simpan').click();
        return false;
    }
});
</script>