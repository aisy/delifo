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
  
@endsection
