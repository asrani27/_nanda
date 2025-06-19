@extends('layouts.app')

@section('content')

<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Edit Data</h5>
        </div>
        <div class="card-body">
            <form method="post" action="/superadmin/perlengkapan/edit/{{$data->id}}">
                @csrf
                <div class="row">
                    <div class="col-sm-12">

                        <div class="form-group">
                            <label class="floating-label" for="Email">nama perlengkapan</label>
                            <input type="text" class="form-control" name="nama" value="{{$data->nama}}" required>
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">stok</label>
                            <input type="text" class="form-control" name="stok" required value="{{$data->stok}}">
                        </div>
                        <div class="form-group">
                            <label class="floating-label" for="Email">keterangan</label>
                            <input type="text" class="form-control" name="keterangan" required
                                value="{{$data->keterangan}}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="/superadmin/perlengkapan" class="btn btn-secondary">Kembali</a>
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