<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($req->all(), [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($validator->fails()) {
            Session::flash('error', 'Harus gambar dan maks 2MB');
            return back();
        }

        $file = $req->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('file', $filename, 'public');


        $param = $req->all();
        $param['file'] = $filename;
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

        if ($req->file == null) {
            $filename = Kamar::find($id)->file;
        } else {

            $validator = Validator::make($req->all(), [
                'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            if ($validator->fails()) {
                Session::flash('error', 'Harus gambar dan maks 2MB');
                return back();
            }

            $file = $req->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('file', $filename, 'public');
        }
        $param = $req->all();
        $param['file'] = $filename;
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
