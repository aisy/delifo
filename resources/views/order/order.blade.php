@extends('master-page')

@section('css')
{{-- <link rel="stylesheet" href="{{ URL::to('Asset/css/jquery.dataTables.min.css') }}" media="screen" title="no title"> --}}
<link rel="stylesheet" href="{{ URL::to('Asset/css/dataTables.bootstrap.min.css') }}" media="screen" title="no title">
@endsection

@section('link_nav')
<li><a href="{{ url('home') }}"><i class="fa fa-home"></i> Halaman Utama</a></li>
<li class="active"><a href="{{ url('order') }}"><i class="fa fa-inbox"></i> Order</a></li>
<li><a href="{{ url('restoran') }}"><i class="fa fa-cutlery"></i> Restoran</a></li>
<li><a href="{{ url('tarif') }}"><i class="fa fa-money"></i> Tarif</a></li>
<li><a href="{{ url('kurir') }}"><i class="fa fa-motorcycle"></i> Kurir</a></li>
<li><a href="{{ url('admin') }}"><i class="fa fa-users"></i> Admin</a></li>
<li><a href="{{ url('pengguna') }}"><i class="fa fa-users"></i> Pengguna</a></li>
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
						<th>Alamat</th>
						<th>Status</th>
						<th>Ongkir</th>
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($data as $element)
					<tr>
						<td>
							@if ($element['id']<=10)
								ODR0{{ $element['id'] }}
							@else
								ODR{{ $element['id'] }}
							@endif
						</td>
						<td>
							@if ($element['id']<=10)
								USR0{{ $element['user_id'] }}
							@else
								USR{{ $element['user_id'] }}
							@endif
						</td>
						<td>{{ $element['created_at'] }}</td>
						<td>{{ $element['alamat'] }}</td>
						<td>
							@if ($element['status']=='belum di konfirmasi')
							<i class="fa fa-ban"></i> {{ $element['status'] }}
							@else
							<i class="fa fa-check"></i> {{ $element['status'] }}
							@endif
						</td>
						<td>{{ $element['ongkir'] }}</td>
						<td class="text-center center">

							<a href="{{ url('order/detail-order/'.$element['id'].'') }}" class="btn btn-xs btn-info">
								<i class="fa fa-list"></i>
							</a>
							{{--  <a href="{{ url('order/ubah-order/'.$element['id']) }}" class="btn btn-xs btn-warning">
								<i class="fa fa-edit"></i>
							</a>  --}}

							{{--  {!! Form::open(['method'=>'DELETE', 'route'=>['order.hapus_data.delete',$element['id']] ]) !!}
							{!! Form::button('<i class="fa fa-times"></i>', ['type'=>'submit', 'class'=>'btn btn-xs btn-danger']) !!}
							{!! Form::close() !!}  --}}

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
