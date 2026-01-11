<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    // 1. Tampilkan Daftar Pasien (Pagination)
    public function index()
    {
        // Menampilkan 10 data per halaman agar rapi
        $pasiens = Pasien::latest()->paginate(10);
        return view('pasien.index', compact('pasiens'));
    }

    // 2. Form Tambah Pasien
    public function create()
    {
        return view('pasien.create');
    }

    // 3. Simpan Pasien (Validasi Input)
    public function store(Request $request)
    {
        $request->validate([
            'nik'           => 'required|unique:pasiens,nik|max:16',
            'nama_pasien'   => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tgl_lahir'     => 'required|date',
            'alamat'        => 'required|string',
        ]);

        Pasien::create($request->all());

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil ditambahkan!');
    }

    // 4. Detail Pasien (Relasi Rekam Medis)
    public function show($id)
    {
        // Mengambil data pasien beserta riwayat medisnya
        $pasien = Pasien::with('rekamMedis')->findOrFail($id);
        return view('pasien.show', compact('pasien'));
    }

    // 5. Form Edit Pasien
    public function edit(Pasien $pasien)
    {
        return view('pasien.edit', compact('pasien'));
    }

    // 6. Update Data Pasien
    public function update(Request $request, Pasien $pasien)
    {
        $request->validate([
            'nama_pasien'   => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:L,P',
            'tgl_lahir'     => 'required|date',
            'alamat'        => 'required|string',
        ]);

        $pasien->update($request->all());

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diperbarui!');
    }

    // 7. Hapus Pasien
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil dihapus!');
    }
}
