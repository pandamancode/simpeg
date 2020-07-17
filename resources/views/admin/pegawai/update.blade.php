@extends('_layouts/main')
@section('content')
<div class="box box-primary box-solid">
    <div class="box-header">
        <i class="fa fa-user-plus fa-fw"></i>
        <h3 class="box-title">Ubah Data Pegawai</h3>
    </div>
    <form method="POST" action="{{ url('/pegawai/update') }}" enctype="multipart/form-data">
    <div class="box-body">
        @csrf
        <div class="form-group">
            <label> NIK :</label>
            <input type="text" name="nik" value="{{ $pegawai->nik }}" class="form-control" placeholder="NIK" required autocomplete="off" readonly>
        </div>

        <div class="form-group">
            <label> Nama Pegawai :</label>
            <input type="text" name="nama" value="{{ $pegawai->nama_pegawai }}" class="form-control" placeholder="Nama Pegawai" required autocomplete="off">
        </div>

        <div class="form-group">
            <label> Jenis Kelamin :</label>
            <select name="jk" class="form-control" required>
                <option value="" selected disabled>Pilih Jenis Kelamin</option>
                <option value="L" <?php if($pegawai->jk=='L'){ echo "selected"; } ?> >Laki - Laki</option>
                <option value="P" <?php if($pegawai->jk=='P'){ echo "selected"; } ?> >Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label> Tempat Lahir :</label>
            <input type="text" name="tempat_lahir" value="{{ $pegawai->tempat_lahir }}" class="form-control" placeholder="Tempat Lahir" required autocomplete="off">
        </div>

        <div class="form-group">
            <label> Tanggal Lahir :</label>
            <input type="date" name="tanggal_lahir" value="{{ $pegawai->tanggal_lahir }}" class="form-control" placeholder="Tanggal Lahir" required autocomplete="off">
        </div>

        <div class="form-group">
            <label> Alamat :</label>
            <textarea class="form-control" name="alamat" placeholder="Alamat">{{ $pegawai->alamat }}</textarea>
        </div>

        <div class="form-group">
            <label> No Telp :</label>
            <input type="text" name="telp" class="form-control" value="{{ $pegawai->no_telp }}" placeholder="No Telp" required autocomplete="off">
        </div>

        <div class="form-group">
            <label> Bidang Kerja :</label>
            <select name="bidang_kerja" class="form-control" required>
                <option value="" selected disabled>Pilih Bidang Kerja</option>
                <option value="Direktur" <?php if($pegawai->bidang_kerja=='Direktur'){ echo "selected"; } ?> >Direktur</option>
                <option value="Bendahara" <?php if($pegawai->bidang_kerja=='Bendahara'){ echo "selected"; } ?> >Bendahara</option>
                <option value="HRD" <?php if($pegawai->bidang_kerja=='HRD'){ echo "selected"; } ?> >HRD</option>
                <option value="Satpam" <?php if($pegawai->bidang_kerja=='Satpam'){ echo "selected"; } ?> >Satpam</option>
                <option value="Driver" <?php if($pegawai->bidang_kerja=='Driver'){ echo "selected"; } ?> >Driver</option>
                <option value="Cleaning Service" <?php if($pegawai->bidang_kerja=='Cleaning Service'){ echo "selected"; } ?> >Cleaning Service</option>
                <option value="Parkir" <?php if($pegawai->bidang_kerja=='Parkir'){ echo "selected"; } ?> >Parkir</option>
            </select>
        </div>

        <div class="form-group">
            <label> Foto :</label>
            <input type="file" name="foto" class="form-control" placeholder="Foto" autocomplete="off">
        </div>
  		
    </div>

    <div class="box-footer">
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