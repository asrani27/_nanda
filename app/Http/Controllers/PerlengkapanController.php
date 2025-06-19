<?php

namespace App\Http\Controllers;

use App\Models\Perlengkapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PerlengkapanController extends Controller
{

    public function index()
    {
        $data = Perlengkapan::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.perlengkapan.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.perlengkapan.create');
    }
    public function store(Request $req)
    {
        $param = $req->all();
        Perlengkapan::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/perlengkapan');
    }
    public function edit($id)
    {
        $data = Perlengkapan::find($id);
        return view('superadmin.perlengkapan.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        Perlengkapan::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/perlengkapan');
    }
    public function delete($id)
    {
        Perlengkapan::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/perlengkapan');
    }
}
