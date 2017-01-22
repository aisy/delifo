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