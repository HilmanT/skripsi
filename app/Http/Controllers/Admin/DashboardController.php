<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class DashboardController extends Controller
{
    public function index() {
        $totalPendaftaran = Pendaftaran::all();
        $pendaftaranMenunggu = Pendaftaran::where('status', false)->get();
        $pendaftaranSelesai = Pendaftaran::where('status', true)->get();
        $antrian = Pendaftaran::with('user')->where('status', false)->get();

        $countTotal = count($totalPendaftaran);
        $countMenunggu = count($pendaftaranMenunggu);
        $countSelesai = count($pendaftaranSelesai);

        return view('admin.dashboard', compact('countTotal', 'countMenunggu', 'countSelesai', 'antrian'));
    }
}
