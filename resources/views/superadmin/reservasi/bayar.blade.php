@extends('layouts.app')

@section('content')

<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Pembayaran Reservasi Kamar</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/superadmin/bayar/{{$reservasi->id}}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">

                        <div class="form-group">
                            <label class="floating-label" for="Email">Nomor Kamar</label>
                            <input type="text" class="form-control" name="nomor" value="{{$reservasi->kamar->nomor}}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">tipe</label>
                            <input type="text" class="form-control" name="tipe" value="{{$reservasi->kamar->tipe}}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">check_in</label>
                            <input type="date" class="form-control" name="check_in" value="{{$reservasi->check_in}}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">check_out</label>
                            <input type="date" class="form-control" name="check_out" value="{{$reservasi->check_in}}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">Lama Hari</label>
                            <input type="text" class="form-control" name="lama" required
                                onkeypress="return hanyaAngka(event)" value="{{$reservasi->lama}}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">harga</label>
                            <input type="text" class="form-control" name="harga" required
                                onkeypress="return hanyaAngka(event)" value="{{number_format($reservasi->harga)}}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">Total</label>
                            <input type="text" class="form-control" required onkeypress="return hanyaAngka(event)"
                                value="{{number_format($reservasi->harga * $reservasi->lama)}} " readonly>
                        </div>
                        <hr>
                        <h2>Pembayaran</h2>
                        <hr>
                        <div class="form-group">
                            <label class="floating-label" for="Email">Tanggal Pembayaran</label>
                            <input type="date" class="form-control" name="tanggal"
                                value="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">metode pembayaran</label>
                            <input type="text" class="form-control" name="metode" required placeholder="cash">
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">Jumlah Bayar</label>
                            <input type="text" class="form-control" name="jumlah" required
                                onkeypress="return hanyaAngka(event)">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Bayar</button>
                            <a href="/superadmin/reservasi">Kembali</a>
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