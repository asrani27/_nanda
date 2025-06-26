@extends('layouts.app')

@section('content')
<div class="row">
    <!-- [ stiped-table ] start -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5>Data Pembayaran Pelanggan</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">


                        <a href="/superadmin/laporan/pembayaran" target="_blank" class="btn btn-danger">Print</a>

                    </div>
                </div>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>No Reservasi</th>
                                <th>Pelanggan</th>
                                <th>Metode Bayar</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key=> $item)
                            <tr>
                                <td>{{$data->firstItem() + $key}}</td>
                                <td>{{\carbon\carbon::parse($item->tanggal)->format('d M Y')}}</td>
                                <td>REV.{{$item->reservasi_id}}</td>
                                <td>{{$item->reservasi == null ? null : $item->reservasi->user->name}}</td>

                                <td>{{$item->metode}}</td>
                                <td>{{number_format($item->jumlah)}}</td>
                            </tr>
                            @endforeach


                        </tbody>
                        {{$data->links()}}
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection