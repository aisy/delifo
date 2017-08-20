<!DOCTYPE html>
<html>
<head>

	<title>Login</title>
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

	<link rel="stylesheet" type="text/css" href="">
	<link rel="stylesheet" href="{{ URL::to('Asset/font-awesome/css/font-awesome.css')}}" media="screen" title="no title">
	<link rel="stylesheet" href="{{ URL::to('Asset/css/bootstrap.css')}}" media="screen" title="no title">
	<link rel="stylesheet" href="{{ URL::to('Asset/css/style.css')}}" media="screen" title="no title">

	<script type="text/javascript" src="{{ URL::to('Asset/js/jquery.js')}}"></script>
	<script type="text/javascript" src="{{ URL::to('Asset/js/bootstrap.js')}}"></script>

</head>
<body>

	<section class="cta">
		<div class="cta-content">
			<div class="container">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

					<div class="center text-center">
						<div class="icon-mk"><i class="fa fa-cutlery fa-3x"></i></div>
					</div>
					<h2>Selamat datang di Sist Pemesanan Makanan</h2>
					<p>Tolong kelola data dan administrasi dengan baik</p>

				</div>

				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="panel panel-login">
						<div class="panel-body">

							@if (count($errors)>0)

							<div class="alert alert-danger">
								<i class="fa fa-warning"></i>
								<strong>Terjadi Kesalahan!</strong>
								<ul>
									@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>

							@endif

							<form action="{{ URL::to('auth/login') }}" method="POST" role="form">

								<!-- buat token untuk verifikasi dan keamanan -->
								<input type="hidden" name="_token" value="{{csrf_token()}}" />

								<legend><i class="fa fa-sign-in"></i> Login</legend>

								<div class="form-group">
									<label for=""><i class="fa fa-user"></i> Username</label>
									<input type="text" name="name" class="form-control" id="" placeholder="Input field">
								</div>

								<div class="form-group">
									<label for=""><i class="fa fa-lock"></i> Password</label>
									<input type="password" name="password" class="form-control" id="" placeholder="Input field">
								</div>

								<input type="submit" name="ok" value="Login" class="form-control btn btn-success">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="overlay"></div>
	</section>

</body>
</html>
