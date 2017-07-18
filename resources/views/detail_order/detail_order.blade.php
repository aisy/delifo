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
								<th>jumlah</th>
								<th>harga</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($data_detail as $element)
							<tr>
								<td>
									@if ($element['id']<=10)
										DODR0{{ $element['id'] }}
									@else
										DODR{{ $element['id'] }}
									@endif
								</td>
								<td>
									@if ($element['order_id']<=10)
										ODR0{{ $element['order_id'] }}
									@else
										ODR{{ $element['order_id'] }}
									@endif
								</td>
								<td>{{ $element['menu_id'] }}</td>
								<td>{{ $element['keterangan'] }}</td>
								<td>{{ $element['alamat'] }}</td>
								<td>{{ $element['jumlah'] }}</td>
								<td>{{ $element['harga'] }}</td>
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
