@extends('master-page')

@section('css')
	{{-- <link rel="stylesheet" href="{{ URL::to('Asset/css/jquery.dataTables.min.css') }}" media="screen" title="no title"> --}}
	<link rel="stylesheet" href="{{ URL::to('Asset/css/dataTables.bootstrap.min.css') }}" media="screen" title="no title">

@endsection

@section('link_nav')
	<li><a href="{{ url('home') }}"><i class="fa fa-home"></i> Halaman Utama</a></li>
	<li><a href="{{ url('order') }}"><i class="fa fa-inbox"></i> Order</a></li>
	<li><a href="{{ url('restoran') }}"><i class="fa fa-cutlery"></i> Restoran</a></li>
	<li class="active"><a href="{{ url('tarif') }}"><i class="fa fa-money"></i> Tarif</a></li>
	<li><a href="{{ url('kurir') }}"><i class="fa fa-motorcycle"></i> Kurir</a></li>
	<li><a href="{{ url('admin') }}"><i class="fa fa-users"></i> Admin</a></li>
	<li><a href="{{ url('pengguna') }}"><i class="fa fa-users"></i> Pengguna</a></li>
@endsection

@section('title', 'User')

@section('panel1')

	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-4">

		<div class="alert alert-danger">
			<i class="fa fa-warning"></i> Untuk Mengubah satuan cukup, rubah satuan nilai dan harga sesuai keinginan.
		</div>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-money"></i> Tarif</h3>
			</div>
			<div class="panel-body">
				<form action="{{ url('tarif-ubah/1') }}" method="POST" role="form">

					<input type="hidden" name="_token" value="{{csrf_token()}}" />

					<input name="_method" type="hidden" value="PATCH">

					{{--  <div class="form-group">
						<label for="">Jarak Per Meter</label>
						<input type="text" name="jml_jarak" class="form-control" value="{{ $data['jml_jarak'] }}">
					</div>  --}}

					<div class="form-group">
						<label for="">Tarif</label>
						<input type="text" name="tarif" class="form-control" value="{{ $data['tarif'] }}">
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block">Ubah Satuan</button>
					</div>

				</form>
			</div>
		</div>
	</div>

@endsection

@section('js')
	<script src="{{ URL::to('Asset/js/jquery.dataTables.js') }}" charset="utf-8"></script>
	<script src="{{ URL::to('Asset/js/dataTables.bootstrap.min.js') }}" charset="utf-8"></script>
	<script src="{{ URL::to('Asset/js/uploadandpreviewphoto.js') }}" charset="utf-8"></script>
	<script type="text/javascript">
	$(document).ready(function(){

		// datatable
		$('#dataTable').DataTable({
			"language":{
				"url": "Asset/json/indonesian.json"
			}
		}
	);

})
</script>
@endsection
