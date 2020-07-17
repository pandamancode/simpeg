@extends('_layouts/main')
@section('content')
<div class="row">
  <div class="col-md-12">
      <div class="box box-primary box-solid">
        <div class="box-header with-border">
        <i class="fa fa-filter "></i>
          <h3 class="box-title">Filter Data </h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
        <form id="form-filter" method="post">
        @csrf
          <div class="col-md-4">
            <div class="form-group">
              <?php 
                $bln = bulan(date('m'));
              ?>
              <select class="form-control" required="" name="bulan">
                <option selected="" disabled="" value="">-Pilih Bulan-</option>
                <option value="Januari" <?php if($bln=='Januari'){ echo "selected"; } ?> >Januari</option>
                <option value="Februari" <?php if($bln=='Februari'){ echo "selected"; } ?> >Februari</option>
                <option value="Maret" <?php if($bln=='Maret'){ echo "selected"; } ?> >Maret</option>
                <option value="April" <?php if($bln=='April'){ echo "selected"; } ?> >April</option>
                <option value="Mei" <?php if($bln=='Mei'){ echo "selected"; } ?> >Mei</option>
                <option value="Juni" <?php if($bln=='Juni'){ echo "selected"; } ?> >Juni</option>
                <option value="Juli" <?php if($bln=='Juli'){ echo "selected"; } ?> >Juli</option>
                <option value="Agustus" <?php if($bln=='Agustus'){ echo "selected"; } ?> >Agustus</option>
                <option value="September" <?php if($bln=='September'){ echo "selected"; } ?> >September</option>
                <option value="Oktober" <?php if($bln=='Oktober'){ echo "selected"; } ?> >Oktober</option>
                <option value="November" <?php if($bln=='November'){ echo "selected"; } ?> >November</option>
                <option value="Desember" <?php if($bln=='Desember'){ echo "selected"; } ?> >Desember</option>
              </select>
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
              <select class="form-control" required="" name="tahun">
                <option selected="" disabled="" value="">-Pilih Tahun-</option>
                <?php $nw=date('Y'); $now = date('Y')+1; for($i=2020;$i<=$now;$i++){ ?>
                <option value="<?php echo $i ?>" <?php if($nw==$i){ echo "selected"; } ?> ><?php echo $i ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="col-md-2">
            <button type="submit" id="btn_tampil" class="btn btn-primary btn-flat"><i class="fa fa-filter fa-fw"></i> Filter</button>
          </div>
        </form>

        <div class="col-md-12" id="show"></div>

        </div>
      </div>
  </div>
</div>


<div id="tempat-modal"></div>
<script type="text/javascript">

$(document).ready(function() { 
    $('#penggajian').addClass('active');
    $('#gajian').addClass('active');
});

$('#form-filter').submit(function (event) {
    dataString = $("#form-filter").serialize();
    $.ajax({
        type:"POST",
        url:"{{url('/gaji/filter')}}",
        data:dataString,
        beforeSend:function(){
          $("#show").html('<img src="{{url('assets/loading-spinner-blue.gif')}}"/><span> Loading...</span>');
        },
        success: function(msg){
            $('#show').html(msg);
        },
    });
    event.preventDefault();
});
</script>

@endsection