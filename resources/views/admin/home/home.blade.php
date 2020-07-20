@extends('_layouts/main')
@section('content')
<div class="row">
  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{ $pegawai }}</h3>
        <p>Pegawai</p>
      </div>
      <div class="icon">
        <i class="fa fa-user"></i>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{ $mitra }}</h3>
        <p>Perusahaan Mitra</p>
      </div>
      <div class="icon">
        <i class="fa fa-bank"></i>
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{ $penempatan }}</h3>
        <p>Sudah Bekerja</p>
      </div>
      <div class="icon">
        <i class="fa fa-briefcase"></i>
      </div>
    </div>
  </div>

</div>

<script type="text/javascript">
  $('#dashboard').addClass('active');
</script>

@endsection
