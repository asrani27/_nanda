@extends('layouts.app')

@section('content')

<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Profil Saya</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/user/profil" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">

                        <div class="form-group">
                            <label class="floating-label" for="Email">ID Pelanggan</label>
                            <input type="text" class="form-control" value="P{{$data->id}}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">Nama Lengkap</label>
                            <input type="text" class="form-control" name="name" value="{{$data->name}}" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">email </label>
                            <input type="email" class="form-control" name="email" value="{{$data->email}}" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">telp </label>
                            <input type="text" class="form-control" name="telp" value="{{$data->telp}}" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">alamat </label>
                            <input type="text" class="form-control" name="alamat" value="{{$data->alamat}}" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Profil</button>
                            <a href="/user/dashboard" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
</script>
@endpush