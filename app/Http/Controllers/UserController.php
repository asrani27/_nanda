<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Kamar;
use App\Models\Pengaduan;
use App\Models\Pengajuan;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }
    public function reservasi()
    {
        $data = Reservasi::where('user_id', Auth::user()->id)->paginate(10);
        return view('user.reservasi', compact('data'));
    }
    public function deleteReservasi($id)
    {
        $data = Reservasi::find($id)->delete();
        Session::flash('success', 'Reservasi Dibatalkan');
        return back();
    }
    public function pesan($id)
    {
        $data = Kamar::find($id);
        return view('user.pesan', compact('id', 'data'));
    }
    public function bayar($id)
    {
        $reservasi = Reservasi::find($id);
        return view('user.bayar', compact('id', 'reservasi'));
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
        $param['status'] = 'lunas';
        return redirect('/user/reservasi');
    }

    public function laporan_reservasi()
    {
        $data = Reservasi::get();
        $pdf = Pdf::loadView('superadmin.laporan.pdf_reservasi', compact('data'))->setPaper('a4', 'landscape');;
        return $pdf->stream();
    }
    public function simpanPesan(Request $req, $id)
    {
        $checkin = Carbon::parse($req->check_in);
        $checkout = Carbon::parse($req->check_out);
        if ($req->check_in == $req->check_out) {
            Session::flash('error', 'tgl checkin dan checkout tidak bisa sama');
            return back();
        } else {

            $param = $req->all();
            $param['user_id'] = Auth::user()->id;
            $param['kamar_id'] = $id;
            $param['lama'] = $checkin->diffInDays($checkout);
            $param['status'] = 'menunggu pembayaran';

            $reservasi = Reservasi::create($param);

            return redirect('/user/bayar/' . $reservasi->id);
        }
    }
    public function index()
    {
        $data = User::all();
        return view('superadmin.user.index', compact('data'));
    }

    public function add()
    {
        return view('superadmin.user.create');
    }

    public function store(Request $req)
    {
        $check = User::where('username', $req->username)->first();
        if ($check != null) {
            Session::flash('error', 'Username sudah digunakan, silahkan gunakan username lain');
            return back();
        } else {
            $s = new User;
            $s->name = $req->name;
            $s->username = $req->username;
            $s->password = Hash::make($req->password);
            $s->roles = 'superadmin';
            $s->save();
            Session::flash('success', 'Berhasil Simpan');
            return redirect('/superadmin/user');
        }
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('superadmin.user.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        if ($req->password == null) {
            $s = User::find($id);
            $s->name = $req->name;
            $s->username = $req->username;
            $s->save();
            Session::flash('success', 'Berhasil di update');
        } else {
            $s = User::find($id);
            $s->name = $req->name;
            $s->username = $req->username;
            $s->password = Hash::make($req->password);
            $s->save();
            Session::flash('success', 'Berhasil diupdate');
        }
        return redirect('/superadmin/user');
    }

    public function delete($id)
    {
        $delete = User::find($id)->delete();
        Session::flash('success', 'Berhasil dihapus');
        return redirect('/superadmin/user');
    }
}
