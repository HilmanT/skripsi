<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\RekamMedis;
use Auth;

class RekamMedisController extends Controller
{
    public function index() {
        $antrian = Pendaftaran::with('user')->orderBy('status', 'asc')->get();

        return view('dokter.rekam-medis.index', compact('antrian'));
    }

    public function create($reg) {
        $data = Pendaftaran::with('user')->where('no_registrasi', $reg)->first();

        return view('dokter.rekam-medis.create', compact('data'));
    }

    public function store(Request $request, $reg) {
        $data = $request->except('_token');

        RekamMedis::updateOrCreate($data);

        Pendaftaran::with('user')->where('no_registrasi', $reg)->update([
            'status' => true
        ]);

        return redirect()->route('antrian');
    }

    public function show() {
        $rekamMedis = RekamMedis::with(['pendaftaran', 'pasien'])->get();

        return view('dokter.rekam-medis.show', compact('rekamMedis'));
    }

    public function invoice($id) {
        $rekamMedis = RekamMedis::with(['pendaftaran', 'pasien'])->where('id_pendaftaran', $id)->first();

        return view('invoice', compact('rekamMedis'));
    }
}
