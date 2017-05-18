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

@section('title', 'Edit Menu')

@section('panel1')
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Ubah Menu</h3>
      </div>
      <div class="panel-body">
        <form class="" action="{{ url('menu-edit/'.$id) }}" method="post" enctype="multipart/form-data">

          <input name="_method" type="hidden" value="PATCH">

          <div class="form-group">
            <label for="">Nama Menu</label>
            <input type="text" name="nama_menu" class="form-control" id="" value="{{ $data['nama_menu'] }}">
          </div>

          {{-- <input type="hidden" name="restoran_id" value="{{ $id }}"> --}}

          <div class="form-group">
            <label for="">Gambar Menu</label>
  					<div class="input-group image-preview">
  						<input type="text" value="{{ $data['gambar'] }}" name="gambar" class="form-control image-preview-filename"> <!-- don't give a name === doesn't send on POST/GET -->
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
            <label for="">Harga</label>
            <input type="number" name="harga" class="form-control" id="" value="{{ $data['harga'] }}">
          </div>

          <div class="form-group">
            <label for="">Deskripsi</label>
            {{-- <input type="text" class="form-control" id="" placeholder=""> --}}
            <textarea class="form-control" name="deskripsi" rows="8" cols="80">{{ $data['deskripsi'] }}</textarea>
          </div>

          <div class="form-group">
            <label for=""></label>
            <button type="submit" class="btn btn-success btn-block" name="button">
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
