@extends('master-page')

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
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Menu</th>
              <th>Harga</th>
              <th>Deskripsi</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
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
        <form class="" action="index.html" method="post">

          <div class="form-group">
            <label for=""></label>
            <input type="text" class="form-control" id="" placeholder="">
            <p class="help-block">Help text here.</p>
          </div>

          <div class="form-group">
            <label for=""></label>
            <input type="text" class="form-control" id="" placeholder="">
            <p class="help-block">Help text here.</p>
          </div>

          <div class="form-group">
            <label for=""></label>
            <input type="text" class="form-control" id="" placeholder="">
            <p class="help-block">Help text here.</p>
          </div>

        </form>
      </div>
    </div>
  </div>

@endsection
