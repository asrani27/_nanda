<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JabatanController extends Controller
{

    public function index()
    {
        $data = Jabatan::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.jabatan.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.jabatan.create');
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Jabatan::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/jabatan');
    }
    public function edit($id)
    {
        $data = jabatan::find($id);
        return view('superadmin.jabatan.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Jabatan::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/jabatan');
    }
    public function delete($id)
    {
        Jabatan::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/jabatan');
    }
}
