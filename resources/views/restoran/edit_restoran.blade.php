@extends('master-page')

@section('link_nav')
	<li><a href="{{ url('home') }}"><i class="fa fa-home"></i> Halaman Utama</a></li>
	<li><a href="{{ url('order') }}"><i class="fa fa-inbox"></i> Order</a></li>
	<li class="active"><a href="{{ url('restoran') }}"><i class="fa fa-cutlery"></i> Restoran</a></li>
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
			<h3 class="panel-title">Edit Restoran</h3>
		</div>
		<div class="panel-body">

      <div class="alert alert-danger">
        <i class="fa fa-warning"></i> Untuk Mencari lokasi restoran masukkan alamat atau lokasi, jika tidak sesuai silahkan tarik tanda titik merah pada peta untuk merubah lokasi.
      </div>

      <form class="form" action="{{ url('restoran-edit/'.$id) }}" method="post">

        <input type="hidden" name="_action" value="{{ csrf_token() }}">
        <input name="_method" type="hidden" value="PATCH">

        <div class="form-group">
          <div class="input-group">
            <input id="geocomplete" type="text" class="form-control" placeholder="Masukkan Alamat atau Tempat" value="{{ $data['formatted_address'] }}" autocomplete="off">
            <span class="input-group-btn">
              <button id="find" type="button" class="btn btn-info">
                Cari
              </button>
            </span>
          </div>
        </div>

        <div class="form-group">
          <div class="map_canvas"></div>
        </div>

        <div class="form-group">
          <label for="">Nama Restoran</label>
          <input type="text" name="nama_restoran" class="form-control" value="{{ $data['nama_restoran'] }}">
        </div>

        <div class="form-group">
          <label for="">Lat</label>
          <input type="text" name="lat" class="form-control" id="" placeholder="">
        </div>

        <div class="form-group">
          <label for="">Long</label>
          <input type="text" name="lng" class="form-control" id="" placeholder="">
        </div>

				<div class="form-group">
					<label for="">Gambar Restoran</label>

					<div class="text-center center">
						<img src="../Gambar_restoran/{{ $data['gambar'] }}" alt="" height="150px" width="150px">
					</div>
					<br>

					<div class="input-group image-preview">
						<input type="text" placeholder="Pilih gambar dari file" name="gambar" class="form-control image-preview-filename"> <!-- don't give a name === doesn't send on POST/GET -->
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
          <label for="">Alamat</label>
          <input name="formatted_address" class="form-control" type="text" value="{{ $data['formatted_address'] }}">
        </div>

        <div class="form-group">
          <label for="">No. Telp</label>
          <input name="no_telp" class="form-control" type="text" value="{{ $data['no_telp'] }}">
        </div>

        <div class="form-group">
          <button type="submit" name="ok" class="btn btn-success btn-block">
            Masukkan Data
          </button>
        </div>

      </form>
		</div>
	</div>
</div>
@stop

@section('js')
  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDpXxxJbbQ4R_Q33RZ5XVkSuJqFB35Ln6w&libraries=places"></script>
  {{-- <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script> --}}
  <script src="{{ URL::to('Asset/js/jquery.geocomplete.js') }}"></script>

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

<script>

$(function(){
  $("#geocomplete").geocomplete({
    map: ".map_canvas",
    details: "form ",
    types: ["geocode", "establishment"],
    markerOptions: {
      draggable: true
    }
  });

  $("#geocomplete").bind("geocode:dragged", function(event, latLng){
    $("input[name=lat]").val(latLng.lat());
    $("input[name=lng]").val(latLng.lng());
    $("#reset").show();
  });


  $("#reset").click(function(){
    $("#geocomplete").geocomplete("resetMarker");
    $("#reset").hide();
    return false;
  });

  $("#find").click(function(){
    $("#geocomplete").trigger("geocode");
  }).click();
});
</script>
@endsection
