@extends('_layouts/main')
@section('content')
<div class="box box-primary box-solid">
    <div class="box-header">
        <i class="fa fa-plus-circle fa-fw"></i>
        <h3 class="box-title">Tambah Data Honor</h3>
    </div>
    <form method="POST" action="{{ url('/honor/store') }}">
    <div class="box-body">
        @csrf
        <div class="form-group">
            <label> Bidang Kerja :</label>
            <select name="bidang_kerja" class="form-control" required>
                <option value="" disabled selected>Pilih Bidang Kerja</option>
                <option value="Direktur">Direktur</option>
                <option value="Bendahara">Bendahara</option>
                <option value="Bendahara">HRD</option>
                <option value="Bendahara">Satpam</option>
                <option value="Bendahara">Driver</option>
                <option value="Bendahara">Cleaning Service</option>
                <option value="Bendahara">Parkir</option>
            </select>
        </div>

        <div class="form-group">
            <label> Gaji Pokok :</label>
            <input type="number" name="gapok" class="form-control" placeholder="Gaji Pokok" required autocomplete="off">
        </div>

        <div class="form-group">
            <label> Tunjangan :</label>
            <input type="number" name="tunjangan" class="form-control" placeholder="Tunjangan" required autocomplete="off">
        </div>
  		
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-save"></i> Simpan</button>
        <a href="{{ url('/honor') }}" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-close"></i> Batal</a>
    </div>
    </form>
</div>

<script type="text/javascript">
    $('#penggajian').addClass('active');
	$('#honor').addClass('active');
</script>
@endsection