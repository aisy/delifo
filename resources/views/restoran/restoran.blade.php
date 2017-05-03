@extends('master-page')

@section('link_nav')
  <li><a href="{{ url('home') }}"><i class="fa fa-home"></i> Halaman Utama</a></li>
  <li><a href="{{ url('order') }}"><i class="fa fa-inbox"></i> Order</a></li>
  <li class="active"><a href="{{ url('restoran') }}"><i class="fa fa-cutlery"></i> Restoran</a></li>
  <li><a href="{{ url('kurir') }}"><i class="fa fa-motorcycle"></i> Kurir</a></li>
  <li><a href="{{ url('admin') }}"><i class="fa fa-users"></i> Admin</a></li>
  <li><a href="{{ url('pengguna') }}"><i class="fa fa-users"></i> Pengguna</a></li>
@endsection

@section('title','Restoran')

@section('panel1')
  <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-cutlery"></i> Data Restoran</h3>
      </div>
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Restoran</th>
              <th>Alamat</th>
              <th>No. Telp</th>
              <th>Pilihan</th>
            </tr>
          </thead>

          <tbody>
          <?php $i =1 ?>
          @foreach ($data as $restoran)
            <tr>
              <td>{{ $i }}</td>
              <td>{{ $restoran->nama_restoran }}</td>
              <td>{{ $restoran->formatted_address }}</td>
              <td>{{ $restoran->no_telp }}</td>
              <td>
                <div class="btn-group btn-group-sm">
                  <a href="{{ url('menu/'.$restoran->id) }}" type="button" class="btn btn-info">
                    <i class="fa fa-list"></i>
                  </a>
                  <a href="{{ url('restoran-edit/'.$restoran->id) }}" type="button" class="btn btn-warning">
                    <i class="fa fa-edit"></i>
                  </a>
                  <button type="button" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                  </button>
                </div>
              </td>
            </tr>
            <?php $i++; ?>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-amazon"></i> Form Input Restoran</h3>
      </div>
      <div class="panel-body">

        <div class="alert alert-danger">
          <i class="fa fa-warning"></i> Untuk Mencari lokasi restoran masukkan alamat atau lokasi, jika tidak sesuai silahkan tarik tanda titik merah pada peta untuk merubah lokasi.
        </div>

        <form class="form" action="" method="post">

          <input type="hidden" name="_action" value="{{ csrf_token() }}">

          <div class="form-group">
            <div class="input-group">
              <input id="geocomplete" type="text" class="form-control" placeholder="Masukkan Alamat atau Tempat" value="Kota Malang" autocomplete="off">
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
            <input type="text" name="nama_restoran" class="form-control" placeholder="">
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
            <label for="">Alamat</label>
            <input name="formatted_address" class="form-control" type="text" value="">
          </div>

          <div class="form-group">
            <label for="">No. Telp</label>
            <input name="no_telp" class="form-control" type="text" value="">
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
@endsection

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
