@extends('_layouts/main')
@section('content')
<div class="box box-primary box-solid">
    <div class="box-header">
        <i class="fa fa-user-plus fa-fw"></i>
        <h3 class="box-title">Tambah Data Pegawai</h3>
    </div>
    <form method="POST" action="{{ url('/pegawai/store') }}" enctype="multipart/form-data">
    <div class="box-body">
        @csrf
        <div class="form-group">
            <label> NIK :</label>
            <input type="text" name="nik" class="form-control" placeholder="NIK" required autocomplete="off">
        </div>

        <div class="form-group">
            <label> Nama Pegawai :</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama Pegawai" required autocomplete="off">
        </div>

        <div class="form-group">
            <label> Jenis Kelamin :</label>
            <select name="jk" class="form-control" required>
                <option value="" selected disabled>Pilih Jenis Kelamin</option>
                <option value="L">Laki - Laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="form-group">
            <label> Tempat Lahir :</label>
            <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required autocomplete="off">
        </div>

        <div class="form-group">
            <label> Tanggal Lahir :</label>
            <input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" required autocomplete="off">
        </div>

        <div class="form-group">
            <label> Alamat :</label>
            <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
        </div>

        <div class="form-group">
            <label> No Telp :</label>
            <input type="text" name="telp" class="form-control" placeholder="No Telp" required autocomplete="off">
        </div>

        <div class="form-group">
            <label> Bidang Kerja :</label>
            <select name="bidang_kerja" class="form-control" required>
                <option value="" selected disabled>Pilih Bidang Kerja</option>
                <option value="Direktur">Direktur</option>
                <option value="Bendahara">Bendahara</option>
                <option value="HRD">HRD</option>
                <option value="Satpam">Satpam</option>
                <option value="Driver">Driver</option>
                <option value="Cleaning Service">Cleaning Service</option>
                <option value="Parkir">Parkir</option>
            </select>
        </div>

        <div class="form-group">
            <label> Foto :</label>
            <input type="file" name="foto" class="form-control" placeholder="Foto" required autocomplete="off">
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