@extends('layouts.app')

@section('content')
<div class="row">
    <!-- [ stiped-table ] start -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5>Data Reservasi Saya</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">


                        {{-- <a href="/user/laporan/reservasi" target="_blank" class="btn btn-danger">Print</a> --}}
                        {{-- <a href="/user/reservasi/add" class="btn btn-primary">Tambah</a> --}}
                    </div>
                </div>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>No Reservasi</th>
                                <th>tipe kamar</th>
                                <th>check in</th>
                                <th>check out</th>
                                <th>lama</th>
                                <th>harga</th>
                                <th>total</th>
                                <th>status</th>
                                <th>Pembayaran</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key=> $item)
                            <tr>
                                <td>{{$data->firstItem() + $key}}</td>
                                <td>REV.{{$item->id}}</td>
                                <td>{{$item->kamar == null ? null : $item->kamar->tipe}}</td>
                                <td>{{\carbon\carbon::parse($item->check_in)->format('d M Y')}}</td>
                                <td>{{\carbon\carbon::parse($item->check_out)->format('d M Y')}}</td>
                                <td>{{$item->lama}}</td>
                                <td>{{number_format($item->harga)}}</td>
                                <td>{{number_format($item->harga * $item->lama)}}</td>
                                <td>{{$item->status}}</td>
                                <td>
                                    Metode : {{$item->pembayaran == null ? null : $item->pembayaran->metode}} <br />
                                    Jumlah : {{$item->pembayaran == null ? null :
                                    number_format($item->pembayaran->jumlah)}} <br />
                                </td>
                                <td>
                                    @if ($item->status == 'lunas')
                                    <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-check"></i> Selesai</a>
                                    @else
                                    <a href="/user/bayar/{{$item->id}}" class="btn btn-sm btn-success"><i
                                            class="fa fa-check"></i> Bayar</a>
                                    <a href="/user/reservasi/delete/{{$item->id}}" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin dibatalkan?');"><i class="fa fa-times"></i>
                                        batal</a>
                                    @endif


                                </td>
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