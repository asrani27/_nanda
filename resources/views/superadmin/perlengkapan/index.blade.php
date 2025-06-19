@extends('layouts.app')

@section('content')
<div class="row">
    <!-- [ stiped-table ] start -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5>Data perlengkapan</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">


                        <a href="/superadmin/laporan/perlengkapan" target="_blank" class="btn btn-danger">Print</a>
                        <a href="/superadmin/perlengkapan/add" class="btn btn-primary">Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama perlengkapan</th>
                                <th>stok</th>
                                <th>keterangan</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key=> $item)
                            <tr>
                                <td>{{$data->firstItem() + $key}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->stok}}</td>
                                <td>{{$item->keterangan}}</td>
                                <td>
                                    <a href="/superadmin/perlengkapan/edit/{{$item->id}}"
                                        class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="/superadmin/perlengkapan/delete/{{$item->id}}"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin dihapus?');"><i
                                            class="fa fa-trash"></i></a>

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