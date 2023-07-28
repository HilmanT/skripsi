<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekamMedis;
use Auth;

class DashboardController extends Controller
{
    public function show() {
        $user = Auth::user();
        $rekamMedis = RekamMedis::with(['pendaftaran', 'pasien'])->where('id_pasien', $user->id)->get();

        return view('pasien.dashboard', compact('rekamMedis'));
    }
}
