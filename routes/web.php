<?php

use App\Http\Controllers\FasilitasController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\PerlengkapanController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::get('/superadmin', [HomeController::class, 'superadmin']);
    Route::get('/superadmin/laporan', [LaporanController::class, 'index']);

    Route::get('/superadmin/laporan/bulan', [LaporanController::class, 'bulan']);

    Route::get('/superadmin/kamar', [KamarController::class, 'index']);
    Route::get('/superadmin/kamar/add', [KamarController::class, 'add']);
    Route::get('/superadmin/kamar/edit/{id}', [KamarController::class, 'edit']);
    Route::get('/superadmin/kamar/delete/{id}', [KamarController::class, 'delete']);
    Route::post('/superadmin/kamar/add', [KamarController::class, 'store']);
    Route::post('/superadmin/kamar/edit/{id}', [KamarController::class, 'update']);

    Route::get('/superadmin/fasilitas', [FasilitasController::class, 'index']);
    Route::get('/superadmin/fasilitas/add', [FasilitasController::class, 'add']);
    Route::get('/superadmin/fasilitas/edit/{id}', [FasilitasController::class, 'edit']);
    Route::get('/superadmin/fasilitas/delete/{id}', [FasilitasController::class, 'delete']);
    Route::post('/superadmin/fasilitas/add', [FasilitasController::class, 'store']);
    Route::post('/superadmin/fasilitas/edit/{id}', [FasilitasController::class, 'update']);

    Route::get('/superadmin/perlengkapan', [PerlengkapanController::class, 'index']);
    Route::get('/superadmin/perlengkapan/add', [PerlengkapanController::class, 'add']);
    Route::get('/superadmin/perlengkapan/edit/{id}', [PerlengkapanController::class, 'edit']);
    Route::get('/superadmin/perlengkapan/delete/{id}', [PerlengkapanController::class, 'delete']);
    Route::post('/superadmin/perlengkapan/add', [PerlengkapanController::class, 'store']);
    Route::post('/superadmin/perlengkapan/edit/{id}', [PerlengkapanController::class, 'update']);


    Route::get('/superadmin/kamar', [KamarController::class, 'index']);
    Route::get('/superadmin/kamar/add', [KamarController::class, 'add']);
    Route::get('/superadmin/kamar/edit/{id}', [KamarController::class, 'edit']);
    Route::get('/superadmin/kamar/delete/{id}', [KamarController::class, 'delete']);
    Route::post('/superadmin/kamar/add', [KamarController::class, 'store']);
    Route::post('/superadmin/kamar/edit/{id}', [KamarController::class, 'update']);

    Route::get('/superadmin/normalisasi', [PerhitunganController::class, 'normalisasi']);
    Route::get('/superadmin/terbobot', [PerhitunganController::class, 'terbobot']);
    Route::get('/superadmin/solusi', [PerhitunganController::class, 'solusi']);
    Route::get('/superadmin/jarak', [PerhitunganController::class, 'jarak']);
    Route::get('/superadmin/preferensi', [PerhitunganController::class, 'preferensi']);

    Route::get('/superadmin/laporan/kriteria', [LaporanController::class, 'kriteria']);
    Route::get('/superadmin/laporan/pegawai', [LaporanController::class, 'pegawai']);
    Route::get('/superadmin/laporan/jabatan', [LaporanController::class, 'jabatan']);
    Route::get('/superadmin/laporan/penilaian', [LaporanController::class, 'penilaian']);
    Route::get('/superadmin/laporan/hasil', [LaporanController::class, 'hasil']);

    Route::get('/laporan/pilih', [LaporanController::class, 'pilih']);
    Route::get('/laporan/klien/print', [LaporanController::class, 'pdfklien']);
    Route::get('/laporan/dokumen/print', [LaporanController::class, 'pdfdokumen']);
    Route::get('/laporan/evaluasi/print', [LaporanController::class, 'pdfevaluasi']);
    Route::get('/laporan/verifikasi/print', [LaporanController::class, 'pdfverifikasi']);
    Route::get('/laporan/dokumen', [LaporanController::class, 'dokumen']);
    Route::get('/laporan/verifikasi', [LaporanController::class, 'verifikasi']);
    Route::get('/laporan/evaluasi', [LaporanController::class, 'evaluasi']);
});
Route::get('/logout', function () {
    Auth::logout();
    Session::flash('success', 'Anda Telah Logout');
    return redirect('/');
});
