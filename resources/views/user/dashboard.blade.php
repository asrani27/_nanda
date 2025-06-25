@extends('layouts.app')

@section('content')
<div class="row">
    <!-- [ horizontal-layout ] start -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>DAFTAR KAMAR</h5>
            </div>
            <div class="card-body text-center">
                <H2>Tanggal : {{\Carbon\carbon::now()->format('d M Y')}}</H2>
                <br />

            </div>
        </div>
    </div>

</div>
@endsection

@push('js')

@endpush