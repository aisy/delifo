@extends('master-page')

@section('link_nav')
<li class="active"><a href="{{ url('home') }}"><i class="fa fa-home"></i> Halaman Utama</a></li>
<li><a href="{{ url('order') }}"><i class="fa fa-inbox"></i> Order</a></li>
<li><a href="{{ url('kurir') }}"><i class="fa fa-motorcycle"></i> Pengemudi</a></li>
<li><a href="{{ url('admin') }}"><i class="fa fa-users"></i> Admin</a></li>
@endsection

@section('title', 'Update')

@section('panel1')
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-md-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Update Data Admin</h3>
		</div>
		<div class="panel-body">

			<form action="{{url('admin/proses-update/'.$id)}}" method="POST" role="form">

                {{-- untuk mengirim method put --}}
                <input name="_method" type="hidden" value="PATCH">

				<div class="form-group">
				    <label>Nama Lengkap</label>
					<input type="text" name="nama_lengkap" class="form-control" id="" value="{{ $data_edit['nama_lengkap'] }}" placeholder="Input field">
				</div>

				<div class="form-group">
				    <label>Username</label>
					<input type="text" name="username" class="form-control" id="" value="{{ $data_edit['username'] }}" placeholder="Input field">
				</div>

				<div class="form-group">
				     <label>Password Baru</label>
					<input type="text" name="password" class="form-control" id="" value="{{ $data_edit['password'] }}" placeholder="Input field">
				</div>

				<div class="form-group">
					<input type="text" name="" class="form-control" id="" placeholder="Input field">
				</div>

				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>


@stop
