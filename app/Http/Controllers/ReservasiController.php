<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ReservasiController extends Controller
{
    public function index()
    {
        $data = Reservasi::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.reservasi.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.reservasi.create');
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
        Reservasi::create($param);
        Session::flash('success', 'Berhasil Disimpan');
        return redirect('/superadmin/reservasi');
    }
    public function edit($id)
    {
        $data = Reservasi::find($id);
        return view('superadmin.reservasi.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {

        if ($req->file == null) {
            $filename = Reservasi::find($id)->file;
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
        Reservasi::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/reservasi');
    }
    public function delete($id)
    {
        Reservasi::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return redirect('/superadmin/reservasi');
    }
}
