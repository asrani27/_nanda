<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $data = Pembayaran::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.pembayaran.index', compact('data'));
    }
}
