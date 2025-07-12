<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PembayaranController extends Controller
{
    public function index()
    {
        $data = Pembayaran::orderBy('id', 'DESC')->paginate(10);

        return view('superadmin.pembayaran.index', compact('data'));
    }
    public function perbulan()
    {
        $bulan = request()->get('bulan');
        $tahun = request()->get('tahun');
        $data = Pembayaran::whereMonth('tanggal', $bulan)->whereYear('tanggal', $tahun)->get();
        $pdf = Pdf::loadView('superadmin.laporan.pdf_perbulan', compact('data', 'bulan', 'tahun'))->setPaper('a4', 'landscape');;
        return $pdf->stream();
    }
}
