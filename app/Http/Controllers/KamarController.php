<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KamarController extends Controller
{

    public function index()
    {
        $data = Kamar::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.kamar.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.kamar.create');
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Kamar::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/kamar');
    }
    public function edit($id)
    {
        $data = Kamar::find($id);
        return view('superadmin.kamar.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Kamar::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/kamar');
    }
    public function delete($id)
    {
        Kamar::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/kamar');
    }
}
