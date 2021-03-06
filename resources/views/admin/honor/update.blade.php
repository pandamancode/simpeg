@extends('_layouts/main')
@section('content')
<div class="box box-primary box-solid">
    <div class="box-header">
        <i class="fa fa-plus-circle fa-fw"></i>
        <h3 class="box-title">Ubah Data Honor</h3>
    </div>
    <form method="POST" action="{{ url('/honor/update') }}">
    <div class="box-body">
        @csrf
        <div class="form-group">
            <label> Bidang Kerja :</label>
            <select name="bidang_kerja" class="form-control" required>
                <option value="" disabled selected>Pilih Bidang Kerja</option>
                <option value="Direktur" <?php if($honor->bidang_kerja=='Direktur'){ echo "selected"; } ?> >Direktur</option>
                <option value="Bendahara" <?php if($honor->bidang_kerja=='Bendahara'){ echo "selected"; } ?> >Bendahara</option>
                <option value="HRD" <?php if($honor->bidang_kerja=='HRD'){ echo "selected"; } ?> >HRD</option>
                <option value="Satpam" <?php if($honor->bidang_kerja=='Satpam'){ echo "selected"; } ?> >Satpam</option>
                <option value="Driver" <?php if($honor->bidang_kerja=='Driver'){ echo "selected"; } ?> >Driver</option>
                <option value="Cleaning Service" <?php if($honor->bidang_kerja=='Cleaning Service'){ echo "selected"; } ?> >Cleaning Service</option>
                <option value="Parkir" <?php if($honor->bidang_kerja=='Parkir'){ echo "selected"; } ?> >Parkir</option>
            </select>
        </div>

        <div class="form-group">
            <label> Gaji Pokok :</label>
            <input type="number" value="{{ $honor->gapok }}" name="gapok" class="form-control" placeholder="Gaji Pokok" required autocomplete="off">
        </div>

        <div class="form-group">
            <label> Tunjangan :</label>
            <input type="number" value="{{ $honor->tunjangan }}" name="tunjangan" class="form-control" placeholder="Tunjangan" required autocomplete="off">
        </div>
  		
    </div>

    <div class="box-footer">
        <input type="hidden" name="id_honor" value="{{ $honor->id_honor }}">
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