@extends('master-page')

@section('css')
{{-- <link rel="stylesheet" href="{{ URL::to('Asset/css/jquery.dataTables.min.css') }}" media="screen" title="no title"> --}}
<link rel="stylesheet" href="{{ URL::to('Asset/css/dataTables.bootstrap.min.css') }}" media="screen" title="no title">
@endsection

@section('link_nav')
<li><a href="{{ url('home') }}"><i class="fa fa-home"></i> Halaman Utama</a></li>
<li><a href="{{ url('order') }}"><i class="fa fa-inbox"></i> Order</a></li>
<li><a href="{{ url('restoran') }}"><i class="fa fa-cutlery"></i> Restoran</a></li>
<li><a href="{{ url('tarif') }}"><i class="fa fa-money"></i> Tarif</a></li>
<li><a href="{{ url('kurir') }}"><i class="fa fa-motorcycle"></i> Kurir</a></li>
<li class="active"><a href="{{ url('admin') }}"><i class="fa fa-users"></i> Admin</a></li>
<li><a href="{{ url('pengguna') }}"><i class="fa fa-users"></i> Pengguna</a></li>
@endsection

@section('title', 'Admin')

@if (count($errors)>0)
<div class="alert alert-danger">
    <i class="fa fa-warning"></i>
    <strong>Terjadi Kesalahan!</strong>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@section('panel1')
<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-database"></i> Data Admin</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>No. Telp</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($data_admin as $admin)
                       <tr>
                        <td>{{ $admin['id'] }}</td>
                        <td>{{ $admin['nama_lengkap'] }}</td>
                        <td>{{ $admin['username'] }}</td>
                        <td>{{ $admin['telpon'] }}</td>
                        <td class="center text-center">

                            <a href="admin/update/{{ $admin['id'] }}" class="btn btn-xs btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>
                            {!! Form::open(['method'=>'DELETE', 'route'=>['admin.hapus_data.delete',$admin['id']]]) !!}

                            {!! Form::button('<i class="fa fa-times"></i>', ['type'=>'submit', 'class'=>'btn btn-xs btn-danger']) !!}
                            {!! Form::close() !!}

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
@endsection

@section('panel2')
<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-download"></i> Input Data Admin</h3>
        </div>
        <div class="panel-body">
            <form method="POST" action="/admin">
                {!! csrf_field() !!}

                <div class="form-group">
                    <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" value="{{ old('nama_lengkap') }}">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Confrim Password" name="password_confirmation">
                </div>

                <div class="form-group">
                    <!-- <input type="text" class="form-control" name="username" value="{{ old('email') }}"> -->
                    <select class="form-control" name="jkel">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="No. Telpon" name="telpon" value="{{ old('telpon') }}">
                </div>

                <div class="form-group">
                    <button class="btn btn-success form-control" type="submit">Register</button>
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
