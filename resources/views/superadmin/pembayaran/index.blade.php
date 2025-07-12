@extends('layouts.app')

@section('content')
<form method="get" action="/superadmin/pembayaran/perbulan" target="_blank">
    <select name="bulan">
        <option value="1">Januari</option>
        <option value="2">Februari</option>
        <option value="3">Maret</option>
        <option value="4">April</option>
        <option value="5">Mei</option>
        <option value="6">Juni</option>
        <option value="7">Juli</option>
        <option value="8">Agustus</option>
        <option value="9">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
    </select>

    <select name="tahun">
        <option value="2025">2025</option>
        <option value="2026">2026</option>
    </select>
    <button type="submit" class="btn btn-xs btn-primary" style="padding: 2px 5px">Print Laporan</button>
</form>
<br /><br />
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
                    </table>
                </div>
                {{$data->links()}}
            </div>
        </div>
    </div>

</div>
@endsection