
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::to('Asset/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::to('Asset/css/style.css') }}" rel="stylesheet">

  </head>

  <body style="margin-top: 80px;">

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

     <div class="panel panel-primary">
     	<div class="panel-heading">
     		<h3 class="panel-title">Panel title</h3>
     	</div>
     	<div class="panel-body">
     		<form action="order/tambah-data" method="POST" role="form">
     			<legend>Form title</legend>

     			<input type="hidden" name="_token" value="{{csrf_token()}}" />
     		
     			<div class="form-group">
     				<input type="text" name="alamat" class="form-control" id="" placeholder="Alamat">
     			</div>
     		
     			<div class="form-group">
     				<!-- <input type="text" name="" class="form-control" id="" placeholder="Input field"> -->
     				<textarea class="form-control" name="deskripsi" placeholder="masukkan deskripsi"></textarea>
     			</div>

     			<div class="form-group">
     				<input type="date" name="tanggal" id="input" class="form-control" value="<?= date('Y-m-d') ?>"  title="">
     			</div>

     			<div class="form-group">
     				<input type="text" name="status" class="form-control" id="" placeholder="Input field">
     			</div>
     		
     			<button type="submit" class="btn btn-primary">Submit</button>
     		</form>
     	</div>
     </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ URL::to('Asset/js/jquery.js') }}"></script>
    <script src="{{ URL::to('Asset/js/bootstrap.js') }}"></script>
    
  </body>
</html>
