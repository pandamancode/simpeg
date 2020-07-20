@extends('_layouts/main')
@section('content')
<div class="row">
  <div class="col-md-12">
      <div class="box box-primary box-solid">
        <div class="box-header with-border">
        <i class="fa fa-print "></i>
          <h3 class="box-title">Cetak Laporan Per Bidang Kerja </h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
        <form id="form-filter" method="post" action="{{ url('laporan/perbidang') }}" target="_blank">
        @csrf
          <div class="col-md-4">
            <div class="form-group">
              <select class="form-control" required="" name="bidang_kerja">
                <option value="" disabled selected>Pilih Bidang Kerja</option>
                <option value="Direktur">Direktur</option>
                <option value="Bendahara">Bendahara</option>
                <option value="HRD">HRD</option>
                <option value="Satpam">Satpam</option>
                <option value="Driver">Driver</option>
                <option value="Cleaning Service">Cleaning Service</option>
                <option value="Parkir">Parkir</option>
              </select>
            </div>
          </div>

          <div class="col-md-2">
            <button type="submit" id="btn_tampil" class="btn btn-primary btn-flat"><i class="fa fa-print fa-fw"></i> Cetak</button>
          </div>
        </form>
        </div>
      </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
      <div class="box box-primary box-solid">
        <div class="box-header with-border">
        <i class="fa fa-print "></i>
          <h3 class="box-title">Cetak Laporan Per Penempatan </h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
        <form id="form-filter" method="post" action="{{ url('laporan/penempatan') }}" target="_blank">
        @csrf
          <div class="col-md-4">
            <div class="form-group">
              <select class="form-control show-tick" required="" name="mitra" id="mitra_select" data-live-search="true" data-size="5">
                <option value="" disabled selected>Pilih Perusahaan Mitra</option>
                @foreach($mitra as $m)
                <option value='{{ $m->id_mitra }}'>{{ $m->nama_mitra }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-md-2">
            <button type="submit" id="btn_tampil" class="btn btn-primary btn-flat"><i class="fa fa-print fa-fw"></i> Cetak</button>
          </div>
        </form>
        </div>
      </div>
  </div>
</div>

<script type="text/javascript">

$(document).ready(function() { 
    $('#laporan').addClass('active');

    $('#mitra_select').selectpicker();
});

</script>

@endsection