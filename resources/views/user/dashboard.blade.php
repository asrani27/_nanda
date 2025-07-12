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
                        <span class="text-white">No. Kamar : {{$item->nomor}} -
                            @if ($item->status == 'T')
                            <span class="badge badge-danger"><i class="fa fa-times"></i> terisi</span>
                            @else
                            <span class="badge badge-success"><i class="fa fa-check"></i> tersedia</span>

                            @endif
                    </div>
                    <div class="col-3 text-right">
                        @if ($item->status != 'T')
                        <a href="/user/pesan/{{$item->id}}" class="btn btn-success">Pesan</a>
                        @endif
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