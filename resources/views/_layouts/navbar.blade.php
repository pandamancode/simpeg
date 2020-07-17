<nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <div id="xloading" class="grspinner" style="display:none">
      <div class="rect1"></div>
    	<div class="rect2"></div>
    	<div class="rect3"></div>
  </div>
  
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      
      <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-user"></i>
        <span class="hidden-xs">{{ Auth::user()->name }}</span> </a>
        <ul class="dropdown-menu">
          <li class="user-header">
            <p> {{ Auth::user()->name }} <small> {{ Auth::user()->level }} </small> </p>
          </li>
          <li class="user-footer">
            <div class="pull-left"> <a href="{{ url('/') }}" class="btn btn-default btn-flat"><i class="fa fa-lock"></i>  Ubah Password</a> </div>

            <div class="pull-right"> <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Keluar</a> </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>