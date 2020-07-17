@extends('_layouts/main')
@section('content')
<div class="box box-primary box-solid">
    <div class="box-header">
        <i class="fa fa-send fa-fw"></i>
        <h3 class="box-title">Ubah Penempatan Pegawai</h3>
    </div>
    <form method="POST" action="{{ url('/penempatan/update') }}">
    <div class="box-body">
        @csrf
        <div class="form-group">
            <label> Nama Pegawai :</label>
            <select name="nik" class="form-control pegawai_select show-tick" data-live-search="true" data-size="5" required>
                <option value="" disabled selected>Pilih Pegawai</option>
                @foreach($pegawai as $p):
                <option value="{{ $p->nik }}" <?php if($penempatan->nik==$p->nik){ echo "selected"; } ?> >{{ $p->nama_pegawai }} ({{ $p->nik }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label> Nama Perusahaan Mitra :</label>
            <select name="id_mitra" class="form-control mitra_select show-tick" data-live-search="true" data-size="5" required>
                <option value="" disabled selected>Pilih Perusahaan Mitra</option>
                @foreach($mitra as $m):
                <option value="{{ $m->id_mitra }}" <?php if($penempatan->id_mitra==$m->id_mitra){ echo "selected"; } ?> >{{ $m->nama_mitra }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label> Status :</label>
            <select name="status" class="form-control" required>
                <option value="" disabled selected>Pilih Status</option>
                <option value="ANGGOTA" <?php if($penempatan->status=='ANGGOTA'){ echo "selected"; } ?>>ANGGOTA</option>
                <option value="KOORDINATOR" <?php if($penempatan->status=='KOORDINATOR'){ echo "selected"; } ?>>KOORDINATOR</option>
            </select>
        </div>
  		
    </div>

    <div class="box-footer">
        <input type="hidden" value="{{ $penempatan->id_penempatan }}" name="id_penempatan">
        <button type="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-save"></i> Simpan</button>
        <a href="{{ url('/penempatan') }}" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-close"></i> Batal</a>
    </div>
    </form>
</div>

<script type="text/javascript">
    
    $( document ).ready(function() {
        $('#penempatan').addClass('active');
        $('.mitra_select').selectpicker('refresh');
        $('.pegawai_select').selectpicker('refresh');
    });

    
</script>
@endsection