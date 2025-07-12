@extends('layouts.app')

@section('content')

<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Pesan Kamar</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/superadmin/reservasi/add" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-12">


                        <div class="form-group">
                            <label for="exampleInputEmail1">Pelanggan </label>
                            <select class="form-control" required name="user_id">
                                @foreach (pelanggan() as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kamar </label>
                            <select class="form-control" required name="kamar_id">
                                @foreach (kamar() as $item)
                                <option value="{{$item->id}}">{{$item->tipe}} - Rp., {{number_format($item->harga)}} -
                                    No kamar : {{$item->nomor}} ( {{$item->status == 'T' ? 'terisi':'tersedia'}})
                                </option>
                                @endforeach
                            </select>
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
                            <button type="submit" class="btn btn-primary">Simpan Reservasi</button>
                            <a href="/superadmin/reservasi" class="btn btn-secondary">Kembali</a>
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