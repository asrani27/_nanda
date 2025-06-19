<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FasilitasController extends Controller
{

    public function index()
    {
        $data = Fasilitas::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.fasilitas.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.fasilitas.create');
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Fasilitas::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/fasilitas');
    }
    public function edit($id)
    {
        $data = Fasilitas::find($id);
        return view('superadmin.fasilitas.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Fasilitas::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/fasilitas');
    }
    public function delete($id)
    {
        Fasilitas::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/fasilitas');
    }
}
