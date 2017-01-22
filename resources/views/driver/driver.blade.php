@extends('master-page')

@section('css')
{{-- <link rel="stylesheet" href="{{ URL::to('Asset/css/jquery.dataTables.min.css') }}" media="screen" title="no title"> --}}
<link rel="stylesheet" href="{{ URL::to('Asset/css/dataTables.bootstrap.min.css') }}" media="screen" title="no title">

@endsection

@section('link_nav')
<li><a href="{{ url('home') }}"><i class="fa fa-home"></i> Halaman Utama</a></li>
<li><a href="{{ url('order') }}"><i class="fa fa-inbox"></i> Order</a></li>
<li class="active"><a href="{{ url('kurir') }}"><i class="fa fa-motorcycle"></i> Kurir</a></li>
<li><a href="{{ url('admin') }}"><i class="fa fa-users"></i> Admin</a></li>
@endsection

@section('title', 'Driver')

@section('panel1')
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-database"></i> Data Driver</h3>
		</div>
		<div class="panel-body">
			{{-- @foreach ($variable as $key => $value) --}}

			<table id="dataTable" class="table table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Gambar</th>
						<th>Kode Kurir</th>
						<th>Nama Lengkap</th>
						<th>Jenis Kelamin</th>
						<th>No. Telp</th>
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($data_driver as $element)
					<tr>
						<td>
							<img src="Driver/{{ $element->gambar }}" class="img-responsive img-circle" alt="Image">
						</td>
						<td>{{ $element['id'] }}</td>
						<td>{{ $element->nama_lengkap }}</td>
						<td>{{ $element->jkel }}</td>
						<td>{{ $element->telpon }}</td>
						<td class="text-center center">

							
							<a href="{{ url('kurir/ubah-data/'.$element['id']) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"> ubah</i>
							</a>

							{!! Form::open([ 'method'=>'DELETE','route'=>['kurir.hapus_data.delete',$element['id'] ] ]) !!}
							{!! Form::button('<i class="fa fa-times"></i> hapus', ['type'=>'submit','class'=>'btn btn-sm btn-danger']) !!}
							{!! Form::close() !!}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{-- @endforeach --}}
		</div>
	</div>
</div>
@endsection

{{-- sadasd --}}
@section('panel2')
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-download"></i> Input Data Driver</h3>
		</div>
		<div class="panel-body">
			<form action="kurir/tambah-data" method="POST" role="form" enctype="multipart/form-data">

				<input type="hidden" name="_token" value="{{csrf_token()}}" />

				<div class="form-group">
					<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
				</div>

				<div class="form-group">
					<input type="text" name="username" class="form-control" placeholder="Username">
				</div>	

				<div class="form-group">
					<input type="password" name="password" class="form-control" placeholder="Password">
				</div>			

				<div class="form-group">
					<select name="jkel" class="form-control">
						<option value="">Pilih Jenis Kelamin</option>
						<option value="laki-laki">Laki-laki</option>
						<option value="perempuan">Perempuan</option>
					</select>
				</div>

				<div class="form-group">
					<input type="text" name="no_tlp" class="form-control" id="" placeholder="No. Telp">
				</div>

				<div class="form-group">
					<div class="input-group image-preview">
						<input type="text" placeholder="Pilih gambar dari file" name="foto" class="form-control image-preview-filename"> <!-- don't give a name === doesn't send on POST/GET -->
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
