@extends('layouts.app')

@section('content')

<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Edit Data</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/superadmin/kamar/edit/{{$data->id}}">
                @csrf
                <div class="row">
                    <div class="col-sm-12">

                        <div class="form-group">
                            <label class="floating-label" for="Email">nomor kamar</label>
                            <input type="text" class="form-control" name="nomor" value="{{$data->nomor}}" required>
                        </div>

                        <div class="form-group">
                            <label class="floating-label" for="Email">tipe</label>
                            <input type="text" class="form-control" name="tipe" value="{{$data->tipe}}" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">harga</label>
                            <input type="text" class="form-control" name="harga" value="{{$data->harga}}" required
                                onkeypress="return hanyaAngka(event)">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Perlengkapan </label>
                            <select class="form-control" required name="perlengkapan_id">
                                @foreach (perlengkapan() as $item)
                                <option value="{{$item->id}}" {{$data->perlengkapan_id == $item->id ?
                                    'selected':''}}>{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Fasilitas</label>
                            <select class="form-control" required name="fasilitas_id">
                                @foreach (fasilitas() as $item)
                                <option value="{{$item->id}}" {{$data->fasilitas_id == $item->id ?
                                    'selected':''}}>{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Status</label>
                            <select class="form-control" required name="status">
                                <option value="">-</option>
                                <option value="Y" {{$data->status == 'Y' ?
                                    'selected':''}}>Tersedia</option>
                                <option value="T" {{$data->status == 'T' ?
                                    'selected':''}}>Terisi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="/superadmin/kamar" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('js')

@endpush