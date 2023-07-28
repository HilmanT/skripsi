<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class AdminPendaftaran extends Controller
{
    public function index(Request $request) {
        $pendaftaran = Pendaftaran::with('user')->orderBy('status', 'asc')->get();

        return view('admin.pendaftaran.index', compact('pendaftaran'));
    }

    public function create(Request $request) {
        return view('admin.pendaftaran.create');
    }

    public function store(Request $request) {
        $pendaftaran = $request->except('_token');

        Pendaftaran::updateOrCreate($pendaftaran);

        return redirect()->route('admin.pendaftaran');
    }

    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::where('id', $id)->first();

        $pendaftaran->delete();

        return redirect()->route('admin.pendaftaran');
    }
}
