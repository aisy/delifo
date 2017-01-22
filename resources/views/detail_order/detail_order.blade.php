@extends('master-page')

@section('link_nav')
<li><a href="{{ url('home') }}"><i class="fa fa-home"></i> Halaman Utama</a></li>
<li><a href="{{ url('order') }}"><i class="fa fa-inbox"></i> Order</a></li>
<li><a href="{{ url('kurir') }}"><i class="fa fa-motorcycle"></i> Kurir</a></li>
<li><a href="{{ url('admin') }}"><i class="fa fa-users"></i> Admin</a></li>
@stop

@section('title', 'Detail Order')

@section('panel1')
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Detail Order dari id: {{ $id }} </h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>id</th>
								<th>id order</th>
								<th>nama order</th>
								<th>keterangan</th>
								<th>alamat</th>
								<th>longitude</th>
								<th>latirude</th>

							</tr>
						</thead>
						<tbody>

							@foreach ($data_detail as $element)
							<tr>
								<td>{{ $element['id'] }}</td>
								<td>{{ $element['id_order'] }}</td>
								<td>{{ $element['nama_order'] }}</td>
								<td>{{ $element['id'] }}</td>
								<td>{{ $element['id'] }}</td>
								<td>{{ $element['id'] }}</td>
								<td>{{ $element['id'] }}</td>
								<td></td>
							</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@stop


