<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="myModalLabel"><i class="fa fa-tag fa-fw"></i> Ubah Gaji Pegawai</h4>
</div>

<form method="post" id="frm-input">

  <div class="modal-body" style="max-height: calc(100vh - 210px);  overflow-y: auto;">
  <!--Cek Data-->
    @foreach($gajis as $gaji)
    <table class="table table-bordered table-striped">
        <tr>
            <td width="35%">Nama Pegawai</td>
            <td width="65%">{{ $gaji->nama_pegawai }}<input type="hidden" value="{{ $gaji->id_penggajian }}" name="id_penggajian"></td>
        </tr>
        <tr>
            <td>Gaji Pokok</td>
            <td>Rp. {{ format_rp($gaji->gapok) }},-<input type="hidden" value="{{ $gaji->gapok }}" name="gapok"></td>
        </tr>
        <tr>
            <td>Tunjangan</td>
            <td>Rp. {{ format_rp($gaji->tunjangan) }},-<input type="hidden" value="{{ $gaji->tunjangan }}" name="tunjangan"></td>
        </tr>
        <tr>
            <td>Gaji Total</td>
            <td>Rp. {{ format_rp($gaji->gapok + $gaji->tunjangan) }},-<input type="hidden" value="{{ $gaji->gapok + $gaji->tunjangan}}" name="total_gaji"></td>
        </tr>
        <tr>
            <td>Potongan</td>
            <td><input type="number" value="{{ $gaji->potongan }}" class="form-control" name="potongan" placeHolder="Potongan"></td>
        </tr>
        
    </table>
    @endforeach
  </div>
  <div class="modal-footer">
    @csrf
    <button type="button" onclick="simpan()" class="btn btn-primary btn-simpan"><i class="fa fa-check-square fa-fw"></i> Simpan</button>
    <button type="button" class="btn btn-danger " data-dismiss="modal"> <i class="fa fa-close fa-fw"></i>Close</button>
  </div>

</form>

<script>

function simpan(){
    dataString = $("#frm-input").serialize();
    $.ajax({
        type:"POST",
        url:"{{url('/gaji/update_proses')}}",
        data:dataString,
        success: function(msg){
            swal({
                title: "Done",
                text:"Entry Data Gaji Berhasil",
                timer: 1500,
                showConfirmButton: false,
                type:"success",
            });
            $('#md-update').modal('hide');
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