<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class DashboardController extends Controller
{
    public function index() {
        $antrian = Pendaftaran::with('user')->orderBy('status', 'asc')->get();

        return view('dokter.dashboard', compact('antrian'));
    }
}
