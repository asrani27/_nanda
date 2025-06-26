<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PelangganController extends Controller
{

    public function index()
    {
        $data = Pelanggan::where('roles', 'user')->orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.pelanggan.index', compact('data'));
    }
    public function add()
    {
        return view('superadmin.pelanggan.create');
    }
    public function store(Request $req)
    {
        $param = $req->all();
        if (Pelanggan::where('email', $req->email)->first() != null) {
            Session::flash('error', 'Email sudah ada');
            return back();
        } else {
            $param['username'] = $req->email;
            $param['password'] = Hash::make($req->email);
            $param['roles'] = 'user';
            Pelanggan::create($param);
            Session::flash('success', 'Berhasil Disimpan');
            return redirect('/superadmin/pelanggan');
        }
    }
    public function edit($id)
    {
        $data = Pelanggan::find($id);
        return view('superadmin.pelanggan.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $param = $req->all();
        $param['username'] = $req->email;
        $param['password'] = Hash::make($req->email);
        $param['roles'] = 'user';
        Pelanggan::find($id)->update($param);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/superadmin/pelanggan');
    }
    public function delete($id)
    {
        dd(Pelanggan::find($id)->reservasi);
        if (count(Pelanggan::find($id)->reservasi) != 0) {
            Session::flash('error', 'Tidak bisa di hapus karena terkait dengan reservasi');
            return back();
        } else {

            Pelanggan::find($id)->delete();
            Session::flash('success', 'Berhasil Dihapus');
            return redirect('/superadmin/pelanggan');
        }
    }
}
