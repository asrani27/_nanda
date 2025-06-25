@extends('layouts.app')

@section('content')

<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Pesan Kamar</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/user/pesan/{{$id}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">

                        <div class="form-group">
                            <label class="floating-label" for="Email">Nomor Kamar</label>
                            <input type="text" class="form-control" name="nomor" value="{{$data->nomor}}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">tipe</label>
                            <input type="text" class="form-control" name="tipe" value="{{$data->tipe}}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">harga</label>
                            <input type="text" class="form-control" name="harga" required
                                onkeypress="return hanyaAngka(event)" value="{{$data->harga}}" readonly>
                        </div>

                        <div class="form-group">
                            <label class="floating-label" for="Email">check_in</label>
                            <input type="date" class="form-control" name="check_in"
                                value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">check_out</label>
                            <input type="date" class="form-control" name="check_out"
                                value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Reservasi Sekarang</button>
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