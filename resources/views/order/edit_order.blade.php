@extends('master-page')

@section('link_nav')
<li><a href="{{ url('home') }}"><i class="fa fa-home"></i> Halaman Utama</a></li>
<li><a href="{{ url('order') }}"><i class="fa fa-inbox"></i> Order</a></li>
<li><a href="{{ url('kurir') }}"><i class="fa fa-motorcycle"></i> Kurir</a></li>
<li><a href="{{ url('admin') }}"><i class="fa fa-users"></i> Admin</a></li>
@endsection

@section('title', 'Edit Kurir')

@section('panel1')
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Edit Kurir</h3>
		</div>
		<div class="panel-body">
			<form action="{{ url('kurir/ubah-data/'.$id) }}" method="POST" role="form">

				<input name="_method" type="hidden" value="PATCH">

				<input type="hidden" name="_token" value="{{csrf_token()}}" />

				<div class="form-group">
					<input type="text" name="nama_lengkap" class="form-control" value="{{ $data['nama_lengkap'] }}">
				</div>

				<div class="form-group">
					<select name="jkel" class="form-control">
						<option value="{{ $data['jkel'] }}">{{ $data['jkel'] }}</option>
						<option value="">========================</option>
						<option value="laki-laki">Laki-laki</option>
						<option value="perempuan">Perempuan</option>
					</select>
				</div>

				<div class="form-group">
					<input type="text" name="telpon" class="form-control" id="" value="{{ $data['telpon'] }}">
				</div>

				<div class="form-group">
					<div class="input-group image-preview">
						<input type="text" value="Pilih gambar dari file" name="foto" class="form-control image-preview-filename"> <!-- don't give a name === doesn't send on POST/GET -->
						<span class="input-group-btn">
							<!-- image-preview-clear button -->
							<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
								<span class="glyphicon glyphicon-remove"></span> Clear
							</button>
							<!-- image-preview-input -->
							<div class="btn btn-primary image-preview-input">
								<span class="glyphicon glyphicon-folder-open"></span>
								<span class="image-preview-input-title">Cari</span>
								<input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/> <!-- rename it -->
							</div>
						</span>
					</div><!-- /input-group image-preview [TO HERE]-->
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>

			</form>
		</div>
	</div>
</div>
@stop
