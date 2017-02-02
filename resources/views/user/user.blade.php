@extends('master-page')

@section('link_nav')
<li><a href="{{ url('home') }}"><i class="fa fa-home"></i> Halaman Utama</a></li>
<li><a href="{{ url('order') }}"><i class="fa fa-inbox"></i> Order</a></li>
<li><a href="{{ url('kurir') }}"><i class="fa fa-motorcycle"></i> Kurir</a></li>
<li><a href="{{ url('admin') }}"><i class="fa fa-users"></i> Admin</a></li>
<li class="active"><a href="{{ url('pengguna') }}"><i class="fa fa-users"></i> Pengguna</a></li>
@endsection

@section('title','Halaman Utama')

@section('panel1')
<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
 <div class="panel panel-primary">
   <div class="panel-body">
    <div class="text-center">
      <span class="fa-stack fa-lg fa-5x font-color" aria-hidden="">
        <i class="fa fa-circle fa-stack-2x"></i>
        <i class="fa fa-user fa-stack-1x fa-inverse"></i>
      </span>

      <h3>Selamat Datang {{ Auth::user()->username }}</h3>
    </div>
  </div>
</div>
</div>
@endsection

@section('panel2')
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Pengelolahan data</h3>
    </div>
    <div class="panel-body text-center">

      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-comments fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">{{ $total_driver }}</div>
                <div>Jumlah Kurir</div>
              </div>
            </div>
          </div>
          <a href="{{ url('kurir/') }}">
            <div class="panel-footer">
              <span class="pull-left">Lihat Detail</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>

      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="panel panel-green">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-inbox fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">{{ $total_order_belum }}</div>
                <div>Jumlah Order baru</div>
              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer">
              <span class="pull-left">Lihat Detail</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
