<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index() {
        $dokters = Dokter::latest()->paginate(10);
        return view('dokter.index', compact('dokters'));
    }

    public function create() {
        return view('dokter.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_dokter' => 'required',
            'spesialis'   => 'required',
            'no_telp'     => 'required',
            'alamat'      => 'required',
        ]);
        Dokter::create($request->all());
        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil ditambahkan');
    }

    public function edit(Dokter $dokter) {
        return view('dokter.edit', compact('dokter'));
    }

    public function update(Request $request, Dokter $dokter) {
        $request->validate([
            'nama_dokter' => 'required',
            'spesialis'   => 'required',
            'no_telp'     => 'required',
            'alamat'      => 'required',
        ]);
        $dokter->update($request->all());
        return redirect()->route('dokter.index')->with('success', 'Data dokter diperbarui');
    }

    public function show(Dokter $dokter)
    {
        // Mengambil data dokter beserta riwayat rekam medis dan nama pasiennya
        $dokter->load('rekamMedis.pasien');
        return view('dokter.show', compact('dokter'));
    }

    public function destroy(Dokter $dokter) {
        $dokter->delete();
        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil dihapus');
    }
}
