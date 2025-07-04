@extends('layouts.app')

@section('content')
<div class="row">
    <!-- [ stiped-table ] start -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5>Data pelanggan</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">


                        <a href="/superadmin/laporan/pelanggan" target="_blank" class="btn btn-danger">Print</a>
                        <a href="/superadmin/pelanggan/add" class="btn btn-primary">Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama pelanggan</th>
                                <th>email</th>
                                <th>telp</th>
                                <th>alamat</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key=> $item)
                            <tr>
                                <td>{{$data->firstItem() + $key}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->telp}}</td>
                                <td>{{$item->alamat}}</td>
                                <td>
                                    <a href="/superadmin/pelanggan/edit/{{$item->id}}" class="btn btn-sm btn-success"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="/superadmin/pelanggan/delete/{{$item->id}}" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin dihapus?');"><i
                                            class="fa fa-trash"></i></a>

                                </td>
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