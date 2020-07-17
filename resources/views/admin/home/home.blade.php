@extends('_layouts/main')
@section('content')
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>User</h3>
        <p>Kelola Mahasiswa</p>
      </div>
      <div class="icon">
        <i class="fa fa-user"></i>
      </div>
      <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <h3>Periode</h3>
        <p>Kelola Tahun Ajaran</p>
      </div>
      <div class="icon">
        <i class="fa fa-calendar"></i>
      </div>
      <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>Su-Ket</h3>
        <p>Pengajuan Surat</p>
      </div>
      <div class="icon">
        <i class="fa fa-envelope-o"></i>
      </div>
      <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-red">
      <div class="inner">
        <h3>Account</h3>
        <p>Kelola Hak Akses</p>
      </div>
      <div class="icon">
        <i class="fa fa-users"></i>
      </div>
      <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('#dashboard').addClass('active');
</script>

@endsection
