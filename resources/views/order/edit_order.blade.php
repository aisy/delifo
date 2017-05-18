@extends('master-page')

@section('link_nav')
	<li><a href="{{ url('home') }}"><i class="fa fa-home"></i> Halaman Utama</a></li>
	<li class="active"><a href="{{ url('order') }}"><i class="fa fa-inbox"></i> Order</a></li>
	<li><a href="{{ url('restoran') }}"><i class="fa fa-cutlery"></i> Restoran</a></li>
	<li><a href="{{ url('tarif') }}"><i class="fa fa-money"></i> Tarif</a></li>
	<li><a href="{{ url('kurir') }}"><i class="fa fa-motorcycle"></i> Kurir</a></li>
	<li><a href="{{ url('admin') }}"><i class="fa fa-users"></i> Admin</a></li>
	<li><a href="{{ url('pengguna') }}"><i class="fa fa-users"></i> Pengguna</a></li>
@endsection

@section('title', 'Edit Kurir')

@section('panel1')
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Edit Order</h3>
		</div>
		<div class="panel-body">

			<form action="{{ url('order/ubah-order/'.$id) }}" method="POST" role="form">

				<input name="_method" type="hidden" value="PATCH">

				<input type="hidden" name="_token" value="{{csrf_token()}}" />

				<div class="form-group">
					<label>Tanggal Pemesanan</label>
					<input type="text" name="tanggal" class="form-control" value="{{ $data['tanggal'] }}">
				</div>

				{{-- <div class="form-group">
					<label>Nama Pemesan</label>
					<input type="text" name="username" class="form-control" value="{{ $data['username'] }}">
				</div> --}}

				<div class="form-group">
					<label>Status Pemesanan</label>
					<select name="status" class="form-control">
						<option value="{{ $data['status'] }}">{{ $data['status'] }}</option>
						<option value="">========================</option>
						<option value="belum di konfirmasi">belum di konfirmasi</option>
						<option value="sudah di konfirmasi">sudah di konfirmasi</option>
					</select>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>

			</form>
		</div>
	</div>
</div>
@endsection
