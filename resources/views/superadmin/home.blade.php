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
                <button type="button" class="btn btn-success"><i class="feather mr-2 icon-check-circle"></i>001</button>
                <button type="button" class="btn btn-success"><i class="feather mr-2 icon-check-circle"></i>002</button>
                <button type="button" class="btn btn-success"><i class="feather mr-2 icon-check-circle"></i>003</button>
                <button type="button" class="btn btn-success"><i class="feather mr-2 icon-check-circle"></i>004</button>
                <button type="button" class="btn btn-success"><i class="feather mr-2 icon-check-circle"></i>005</button>
                <button type="button" class="btn btn-success"><i class="feather mr-2 icon-check-circle"></i>006</button>
                <button type="button" class="btn btn-success"><i class="feather mr-2 icon-check-circle"></i>007</button>
                <button type="button" class="btn btn-success"><i class="feather mr-2 icon-check-circle"></i>008</button>
                <button type="button" class="btn btn-success"><i class="feather mr-2 icon-check-circle"></i>009</button>
                <button type="button" class="btn btn-danger"><i class="feather mr-2 icon-slash"></i>010</button>

            </div>
        </div>
    </div>
    <!-- [ horizontal-layout ] end -->
</div>

@endsection

@push('js')

@endpush