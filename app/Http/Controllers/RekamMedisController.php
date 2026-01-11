<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekamMedis;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Obat;

class RekamMedisController extends Controller
{
    // 1. Menampilkan Daftar Rekam Medis
    public function index()
    {
        // Eager Loading relasi pasien dan dokter agar tidak berat
        $rekamMedis = RekamMedis::with(['pasien', 'dokter'])->latest()->get();
        return view('rekam_medis.index', compact('rekamMedis'));
    }

    // 2. Menampilkan Form Tambah
    public function create()
    {
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        $obats = Obat::all();
        return view('rekam_medis.create', compact('pasiens', 'dokters', 'obats'));
    }

    // 3. Menyimpan Data ke Database
    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'tgl_pemeriksaan' => 'required|date',
            'keluhan' => 'required',
            'diagnosa' => 'required',
            'tindakan' => 'required',
            'obats' => 'required|array' // Validasi harus ada obat yang dipilih
        ]);

        // Simpan data utama ke tabel rekam_medis
        $rm = RekamMedis::create($request->all());

        // Simpan relasi ke tabel pivot (obat_rekam_medis)
        // Ini akan mengisi kolom rekam_medis_id dan obat_id secara otomatis
        $rm->obats()->attach($request->obats);

        return redirect()->route('rekam-medis.index')->with('success', 'Rekam Medis berhasil disimpan!');
    }

    // 4. Menampilkan Detail (Hasil Pemeriksaan & Daftar Obat)
    public function show($id)
    {
        $rm = RekamMedis::with(['pasien', 'dokter', 'obats'])->findOrFail($id);
        return view('rekam_medis.show', compact('rm'));
    }

    // 5. Menghapus Data
    public function destroy($id)
    {
        $rm = RekamMedis::findOrFail($id);
        $rm->delete();
        return redirect()->route('rekam-medis.index')->with('success', 'Data berhasil dihapus');
    }
}
