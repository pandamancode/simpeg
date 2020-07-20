@extends('_layouts/main')
@section('content')
<div class="box box-info">
  <div class="box-header">
    <h3 class="box-title"><i class="fa fa-lock fa-fw"></i> Ubah Password</h3>   
  </div>
  <div class="box-body">
    <form method="POST" action="{{ url('/home/changepw') }}">
      @csrf
      <div class="form-group @error('password') has-warning @enderror">
        <label>Password Baru :</label>
        <input type="password" name="password" class="form-control" placeholder="Password Baru">
        @error('password')
            <span class="help-block" role="alert">
                {{ $message }}
            </span>
        @enderror
      </div>
      <div class="form-group">
        <label>Konfirmasi Password Baru :</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password Baru">
      </div>
      <input type="hidden" value="{{ Auth::user()->id }}" name="id">
      <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save fa-fw"></i> Simpan</button>
      <button type="reset" id="reset" class="btn btn-default btn-flat"><i class="fa fa-refresh fa-fw"></i></button>
    </form>
  </div>
</div> 
@if (session('status'))
<script>
swal({
        title: "Done",
        text: "{{session('status')}}",
        timer: 1500,
        showConfirmButton: false,
        type: "success"
    });
</script>
@endif
@endsection