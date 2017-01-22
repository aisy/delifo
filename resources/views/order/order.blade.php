@extends('master-page')

@section('css')
{{-- <link rel="stylesheet" href="{{ URL::to('Asset/css/jquery.dataTables.min.css') }}" media="screen" title="no title"> --}}
<link rel="stylesheet" href="{{ URL::to('Asset/css/dataTables.bootstrap.min.css') }}" media="screen" title="no title">
@endsection

@section('link_nav')
<li><a href="{{ url('home') }}"><i class="fa fa-home"></i> Halaman Utama</a></li>
<li class="active"><a href="{{ url('order') }}"><i class="fa fa-inbox"></i> Order</a></li>
<li><a href="{{ url('kurir') }}"><i class="fa fa-motorcycle"></i> Kurir</a></li>
<li><a href="{{ url('admin') }}"><i class="fa fa-users"></i> Admin</a></li>
@endsection

@section('title', 'Order')

@section('panel1')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="fa fa-database"></i> Data Order</h3>
		</div>
		<div class="panel-body">
			{{-- @foreach ($variable as $key => $value) --}}
			<table id="dataTable" class="table table-bordered" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Id Pemesanan</th>
						<th>Id User</th>
						<th>Tanggal pesan</th>
						<th>Status</th>
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($data as $element)
					<tr>
						<td>{{ $element['id'] }}</td>
						<td>{{ $element['id_user'] }}</td>
						<td>{{ $element['created_at'] }}</td>
						<td>
							@if ($element['status']=='belum di konfirmasi')
								<i class="fa fa-ban"></i> {{ $element['status'] }}
							@else
								<i class="fa fa-check"></i> {{ $element['status'] }}
							@endif
						</td>
						<td class="text-center center">
							<div class="btn-group">
								<a href="{{ url('order/detail-order/'.$element['id'].'') }}" class="btn btn-xs btn-info">
									<i class="fa fa-list"></i>
								</a>
								<a href="" class="btn btn-xs btn-warning">
									<i class="fa fa-edit"></i>
								</a>
								<a href="" class="btn btn-xs btn-danger">
									<i class="fa fa-times"></i>
								</a>
							</div>
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

@section('js')
<script src="{{ URL::to('Asset/js/jquery.dataTables.js') }}" charset="utf-8"></script>
<script src="{{ URL::to('Asset/js/dataTables.bootstrap.min.js') }}" charset="utf-8"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#dataTable').DataTable(
		{
			"language":{
				"url": "Asset/json/indonesian.json"
			}
		}
		);

	})
</script>
@endsection

