@extends('_layouts/main')
@section('content')
<div class="box box-primary box-solid">
    <div class="box-header">
        <i class="fa fa-user-plus fa-fw"></i>
        <h3 class="box-title">Tambah Data Pengguna</h3>
    </div>
    <form method="POST" action="{{ url('/users/store') }}">
    <div class="box-body">
        @csrf
        <div class="form-group">
            <label> Nama :</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeHolder="Nama" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label> Email :</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeHolder="Email" autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="form-group">
            <label> {{ __('Password') }} :</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeHolder="Password" autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label> {{ __('Confirm Password') }} :</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeHolder="Confirm Password">
        </div>

        <div class="form-group">
            <label> Level :</label>
            <select id="level" class="form-control @error('level') is-invalid @enderror" name="level" required>
                <option value="" disabled selected>Pilih Level</option>
                <option value="ADMIN">ADMIN</option>
                <option value="BENDAHARA">BENDAHARA</option>
                <option value="HRD">HRD</option>
            </select>

            @error('level')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
  		
    </div>

    <div class="box-footer">
        <button type="submit" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-save"></i> Simpan</button>
        <a href="{{ url('/users') }}" class="btn btn-danger btn-sm btn-flat"><i class="fa fa-close"></i> Batal</a>
    </div>
    </form>
</div>

<script type="text/javascript">
    $('#user').addClass('active');
</script>
@endsection