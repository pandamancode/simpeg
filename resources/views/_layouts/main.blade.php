<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SIMPEG</title>
    <link rel="shortcut icon" href="{{url('assets/dist/img/logo.png')}}">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="author" content="thonie, Web Developer">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    @include('_layouts/css')

    @include('_layouts/js')
 	
  </head>
  <body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="javascript:;" class="logo">
          <span class="logo-mini"><b>L</b></span>
          <span class="logo-lg" style="font-size:12pt;"><b>SIMPEG</b> V.1</span>
        </a>
        @include('_layouts/navbar')
      </header>
      @include('_layouts/sidebar')
      <div class="content-wrapper">
        <section class="content">
        @yield('content')
        </section>
      </div>
      <script type="text/javascript">
      function check_int(evt) {
            var charCode = ( evt.which ) ? evt.which : event.keyCode;
            return ( charCode >= 48 && charCode <= 57 || charCode == 8 );
        }

        
      </script>
      @include('_layouts/footer')
    </div>
  </body>
</html>
