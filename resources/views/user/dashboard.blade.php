@extends('layouts.app')

@section('content')
<div class="row">
    <!-- [ horizontal-layout ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>DAFTAR KAMAR</h5>
            </div>
        </div>
    </div>

</div>
<div class="row">
    @foreach (kamar() as $item)

    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">

                <img src="/storage/file/{{$item->file}}" width="100%" height="150px">
            </div>
            <div class="card-footer bg-c-blue">
                <div class="row align-items-center">
                    <div class="col-9">
                        <p class="text-white m-b-0">Tipe : {{$item->tipe}}, Rp. {{number_format($item->harga)}}</p>
                    </div>
                    <div class="col-3 text-right">
                        <a href="/user/pesan" class="btn btn-success">Pesan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@push('js')

@endpush