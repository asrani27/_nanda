@extends('layouts.app')

@section('content')
<div class="row">
    <!-- [ horizontal-layout ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>STATUS KAMAR PENGINAPAN MBA ROS</h5>
            </div>
            <div class="card-body text-center">
                <h1>Tanggal : {{\Carbon\carbon::now()->format('d M Y')}}</h1>
                <br />

                <label class="badge badge-light-success">Hijau = Tersedia</label>
                <br />
                <label class="badge badge-light-danger">Merah = Terisi</label>
                <br />
                <br />
                @foreach (kamar() as $item)
                <button type="button" class="btn {{$item->status == 'Y' ? 'btn-success':'btn-danger'}}"><i
                        class="feather mr-2 icon-check-circle"></i>{{$item->nomor}}</button>
                @endforeach
            </div>
        </div>
    </div>
    <!-- [ horizontal-layout ] end -->
</div>

@endsection

@push('js')

@endpush