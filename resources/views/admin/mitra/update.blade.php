@extends('_layouts/main')
@section('content')
<div class="box box-primary box-solid">
    <div class="box-header">
        <i class="fa fa-user-plus fa-fw"></i>
        <h3 class="box-title">Ubah Data Mitra</h3>
    </div>
    <form method="POST" action="{{ url('/mitra/update') }}">
    <div class="box-body">
        @csrf
        <div class="form-group">
            <label> Nama Mitra :</label>
            <input type="text" name="nama_mitra" value="<?=$mitra->nama_mitra?>" class="form-control" placeholder="Nama Mitra" required autocomplete="off">
        </div>

        <div class="form-group">
            <label> Alamat :</label>
            <textarea class="form-control" name="alamat" placeholder="Alamat"><?=$mitra->alamat?></textarea>
        </div>

        <div class="form-group">
            <label> No Telp :</label>
            <input type="text" name="telp" class="form-control" value="<?=$mitra->telp?>" placeholder="No Telp" required autocomplete="off">
        </div>

        <div class="form-group">
            <label> Jenis Perusahaan :</label>
            <input type="text" name="jenis_perusahaan" class="form-control" value="<?=$mitra->jenis_perusahaan?>" placeholder="Jenis Perusahaan" required autocomplete="off">
        </div>
  		
    </div>

    <div class="box-footer">
        <input type="hidden" name="id_mitra" value="<?=$mitra->id_mitra?>">
        <button type="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-save"></i> Simpan</button>
        <a href="{{ url('/pegawai') }}" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-close"></i> Batal</a>
    </div>
    </form>
</div>

<script type="text/javascript">
    $('#master').addClass('active');
	$('#pegawai').addClass('active');
</script>
@endsection