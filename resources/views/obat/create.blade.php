@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-header py-3" style="background-color: var(--tosca-primary);">
                <h5 class="card-title text-white mb-0 fw-bold">
                    <i class="bi bi-capsule-pill me-2"></i> Tambah Inventaris Obat
                </h5>
            </div>

            <div class="card-body p-4 bg-white">
                <form action="{{ route('obat.store') }}" method="POST">
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Nama Obat</label>
                            <input type="text" name="nama_obat" class="form-control bg-light @error('nama_obat') is-invalid @enderror" placeholder="Contoh: Paracetamol" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Jenis Obat</label>
                            <select name="jenis_obat" class="form-select bg-light" required>
                                <option value="">-- Pilih Jenis --</option>
                                <option value="Tablet">Tablet</option>
                                <option value="Sirup">Sirup</option>
                                <option value="Kapsul">Kapsul</option>
                                <option value="Salep">Salep</option>
                                <option value="Injeksi">Injeksi</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Stok Awal</label>
                            <div class="input-group">
                                <input type="number" name="stok" class="form-control bg-light" placeholder="0" min="0" required>
                                <span class="input-group-text bg-light border-start-0 text-muted small">Qnty</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold">Satuan</label>
                            <input type="text" name="satuan" class="form-control bg-light" placeholder="Contoh: Botol / Strip / Pcs" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold">Keterangan (Opsional)</label>
                            <textarea name="keterangan" class="form-control bg-light" rows="3" placeholder="Kegunaan obat atau dosis umum..."></textarea>
                        </div>
                    </div>

                    <div class="mt-5 pt-3 border-top d-flex justify-content-end gap-2">
                        <a href="{{ route('obat.index') }}" class="btn btn-light px-4 border rounded-3">Batal</a>
                        <button type="submit" class="btn btn-primary px-4 shadow-sm fw-bold rounded-3">Simpan Obat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
