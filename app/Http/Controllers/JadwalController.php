<?php
namespace App\Http\Controllers;
use App\Models\Jadwal;
use App\Models\MataKuliah;
use App\Models\Sesi;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalController extends Controller {
    public function index() {
        \$jadwals = Jadwal::with(['mataKuliah', 'sesi', 'dosen'])->get();
        return view('jadwals.index', compact('jadwals'));
    }

    public function create() {
        return view('jadwals.create', [
            'mataKuliahs' => MataKuliah::all(),
            'sesis' => Sesi::all(),
            'dosens' => User::where('role', 'dosen')->get()
        ]);
    }

    public function store(Request \$request) {
        Jadwal::create(\$request->all());
        return redirect()->route('jadwals.index');
    }

    public function edit(Jadwal \$jadwal) {
        return view('jadwals.edit', [
            'jadwal' => \$jadwal,
            'mataKuliahs' => MataKuliah::all(),
            'sesis' => Sesi::all(),
            'dosens' => User::where('role', 'dosen')->get()
        ]);
    }

    public function update(Request \$request, Jadwal \$jadwal) {
        \$jadwal->update(\$request->all());
        return redirect()->route('jadwals.index');
    }

    public function destroy(Jadwal \$jadwal) {
        \$jadwal->delete();
        return redirect()->route('jadwals.index');
    }
}
