<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	{{-- <link rel="icon" href="/favicon.ico"> --}}

	<title>
		@yield('title')
	</title>

	<link rel="stylesheet" href="{{ URL::to('Asset/font-awesome/css/font-awesome.css')}}" media="screen" title="no title">
	<link rel="stylesheet" href="{{ URL::to('Asset/css/bootstrap.css')}}" media="screen" title="no title">
		@yield('css')
	<link rel="stylesheet" href="{{ URL::to('Asset/css/style.css')}}" media="screen" title="no title">

	<script type="text/javascript" src="{{ URL::to('Asset/js/jquery.js')}}"></script>
	<script type="text/javascript" src="{{ URL::to('Asset/js/bootstrap.js')}}"></script>

</head>

<body>

  <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid ">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Sistem pemesanan Makanan</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav">
          @yield('link_nav')
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->username }} <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#"><i class="fa fa-user"></i> Profil Anda</a></li>
              <li><a href="#"><i class="fa fa-gear"></i> Ubah data</a></li>
              <li class="divider"></li>
              <li><a href="{{ url('auth/logout')}}"><i class="fa fa-sign-out"></i> Keluar</a></li>
            </ul>
          </li>

        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <div class="container">

    @yield('panel1')
		@yield('panel2')

  </div><!-- /.container -->

  @yield('js')



</body>
</html>
