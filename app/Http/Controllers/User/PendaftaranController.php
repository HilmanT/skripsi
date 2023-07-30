<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Auth;

class PendaftaranController extends Controller
{
    public function index(Request $request) {
        $user = $request->user();
        $pendaftaran = Pendaftaran::with('user')->where('id_pasien', $user->id)->get();

        return view('pasien.pendaftaran.index', compact('pendaftaran'));
    }

    public function create(Request $request) {
        return view('pasien.pendaftaran.create', [
            'user' => $request->user(),
        ]);
    }

    public function store(Request $request) {
        $user = $request->user();
        $pendaftaran = $request->except('_token');
        $lastPendaftaran = Pendaftaran::where('id_pasien', $user->id)->where('status', false)->first();

        $user->fill($pendaftaran);
        $user->save();

        if (isset($lastPendaftaran)) {
            Pendaftaran::updateOrCreate([
                'id_pasien' => $user->id
            ]);
        } else {
            Pendaftaran::create([
                'id_pasien' => $user->id
            ]);
        }

        return redirect()->route('pendaftaran');
    }

    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::where('id', $id)->first();

        $pendaftaran->delete();

        return redirect()->route('pendaftaran');
    }
}
