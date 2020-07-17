  <aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu">
      <li class="header"><strong>MAIN MENU</strong></li>
      
      <li class="treeview" id="dashboard">
        <a href="{{ url('/home') }}">
          <i class="ion ion-ios-home"></i> <span>Home</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <?php if(Auth::user()->level=='HRD'){ ?>
      <li class="treeview" id="master">
        <a href="javascript:;">
          <i class="ion ion-ios-folder"></i>
          <span>Master Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li id="pegawai"><a href="{{url('/pegawai')}}"><i class="fa fa-circle-o"></i> Pegawai</a></li>
          <li id="mitra"><a href="{{url('/mitra')}}"><i class="fa fa-circle-o"></i> Mitra</a></li>
        </ul>
      </li>

      <li class="treeview" id="penempatan">
        <a href="{{ url('/penempatan') }}">
          <i class="fa fa-random"></i> <span>Penempatan</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <?php } ?>

      <?php if(Auth::user()->level=='BENDAHARA'){ ?>
      <li class="treeview" id="penggajian">
        <a href="javascript:;">
          <i class="fa fa-dollar"></i>
          <span>Penggajian</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li id="honor"><a href="{{url('/honor')}}"><i class="fa fa-circle-o"></i> Pengaturan Honor</a></li>
          <li id="gajian"><a href="{{url('/gaji')}}"><i class="fa fa-circle-o"></i> Entry Data Gaji</a></li>
        </ul>
      </li>

      <li class="treeview" id="laporan">
        <a href="{{url('/laporan')}}">
          <i class="fa fa-list-alt"></i> <span>Laporan</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <?php } ?>
      
      <?php if(Auth::user()->level=='ADMIN'){ ?>
      <li class="treeview" id="user">
        <a href="{{url('/users')}}">
          <i class="fa fa-users"></i> <span>Manajemen Pengguna</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <?php } ?>

      
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>