<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kamar;
use App\Models\Reservasi;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ReservasiController extends Controller
{
    public function bayar($id)
    {
        $reservasi = Reservasi::find($id);
        return view('superadmin.reservasi.bayar', compact('id', 'reservasi'));
    }
    public function simpanBayar(Request $req, $id)
    {
        $data = Reservasi::find($id);
        if ($req->jumlah < ($data->harga * $data->lama)) {
            Session::flash('error', 'Jumlah bayar tidak boleh kurang dari total yang harus di bayar');
            return back();
        }
        $param = $req->all();
        $param['reservasi_id'] = $id;
        $data->update(['status' => 'lunas']);

        Pembayaran::create($param);
        return redirect('/superadmin/reservasi');
    }

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
        $checkin = Carbon::parse($req->check_in);
        $checkout = Carbon::parse($req->check_out);
        if ($req->check_in == $req->check_out) {
            Session::flash('error', 'tgl checkin dan checkout tidak bisa sama');
            return back();
        } else {

            $param = $req->all();
            $param['user_id'] = $req->user_id;
            $param['kamar_id'] = $req->kamar_id;
            $param['lama'] = $checkin->diffInDays($checkout);
            $param['harga'] = Kamar::find($req->kamar_id)->harga;
            $param['status'] = 'menunggu pembayaran';

            $reservasi = Reservasi::create($param);
            Session::flash('success', 'Berhasil Disimpan');
            return redirect('/superadmin/reservasi');
        }
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
