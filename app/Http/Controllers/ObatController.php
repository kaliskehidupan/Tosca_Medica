<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index() {
        $obats = Obat::latest()->paginate(10);
        return view('obat.index', compact('obats'));
    }

    public function create() {
        return view('obat.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_obat' => 'required',
            'jenis_obat' => 'required',
            'stok' => 'required|numeric|min:0',
            'satuan' => 'required',
        ]);
        Obat::create($request->all());
        return redirect()->route('obat.index')->with('success', 'Obat berhasil ditambahkan');
    }

    public function edit(Obat $obat) {
        return view('obat.edit', compact('obat'));
    }

    public function update(Request $request, Obat $obat) {
        $request->validate([
            'nama_obat' => 'required',
            'jenis_obat' => 'required',
            'stok' => 'required|numeric|min:0',
            'satuan' => 'required',
        ]);
        $obat->update($request->all());
        return redirect()->route('obat.index')->with('success', 'Data obat berhasil diperbarui');
    }

    public function show(Obat $obat)
    {
        return view('obat.show', compact('obat'));
    }

    public function destroy(Obat $obat) {
        $obat->delete();
        return redirect()->route('obat.index')->with('success', 'Obat berhasil dihapus');
    }
}
