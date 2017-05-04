@extends('master-page')

@section('css')
{{-- <link rel="stylesheet" href="{{ URL::to('Asset/css/jquery.dataTables.min.css') }}" media="screen" title="no title"> --}}
<link rel="stylesheet" href="{{ URL::to('Asset/css/dataTables.bootstrap.min.css') }}" media="screen" title="no title">

@endsection

@section('link_nav')
  <li><a href="{{ url('home') }}"><i class="fa fa-home"></i> Halaman Utama</a></li>
  <li><a href="{{ url('order') }}"><i class="fa fa-inbox"></i> Order</a></li>
  <li class="active"><a href="{{ url('restoran') }}"><i class="fa fa-cutlery"></i> Restoran</a></li>
  <li><a href="{{ url('kurir') }}"><i class="fa fa-motorcycle"></i> Kurir</a></li>
  <li><a href="{{ url('admin') }}"><i class="fa fa-users"></i> Admin</a></li>
  <li><a href="{{ url('pengguna') }}"><i class="fa fa-users"></i> Pengguna</a></li>
@endsection

@section('title','Menu Restoran')

@section('panel1')

  <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          List Menu
        </h3>
      </div>
      <div class="panel-body">
          <table id="dataTable" class="table table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Menu</th>
                {{-- <th>Gambar</th> --}}
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1 ?>
              @foreach ($data as $menu)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $menu->nama_menu }}</td>
                  {{-- <td>{{ $menu->gambar }}</td> --}}
                  <td>{{ $menu->harga }}</td>
                  <td>{{ $menu->deskripsi }}</td>
                  <td>
                    <div class="btn-group btn-group-sm">
                      <a href="" type="button" class="btn btn-warning">
                        <i class="fa fa-edit"></i>
                      </a>
                      <a href="" type="button" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                      </a>
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
        <h3 class="panel-title">Insert Menu</h3>
      </div>
      <div class="panel-body">
        <form class="" action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label for="">Nama Menu</label>
            <input type="text" name="nama_menu" class="form-control" id="" placeholder="">
          </div>

          <input type="hidden" name="restoran_id" value="{{ $id }}">

          <div class="form-group">
            <label for="">Gambar Menu</label>
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
            <label for="">Harga</label>
            <input type="number" name="harga" class="form-control" id="" placeholder="">
          </div>

          <div class="form-group">
            <label for="">Deskripsi</label>
            {{-- <input type="text" class="form-control" id="" placeholder=""> --}}
            <textarea class="form-control" name="deskripsi" rows="8" cols="80"></textarea>
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
