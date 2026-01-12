@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        {{-- Menampilkan pesan error validasi jika ada --}}
        @if ($errors->any())
            <div class="alert alert-danger shadow-sm rounded-3 mb-4">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-header py-3" style="background-color: #fefce8; border-bottom: 1px solid #fef08a;">
                <h5 class="mb-0 fw-bold" style="color: #854d0e;">
                    <i class="bi bi-pencil-square me-2"></i>Edit Data Obat
                </h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('obat.update', $obat->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">
                        {{-- Nama Obat --}}
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Nama Obat</label>
                            <input type="text" name="nama_obat" class="form-control bg-light @error('nama_obat') is-invalid @enderror" value="{{ old('nama_obat', $obat->nama_obat) }}" required>
                        </div>

                        {{-- Jenis Obat --}}
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Jenis Obat</label>
                            <select name="jenis_obat" class="form-select bg-light @error('jenis_obat') is-invalid @enderror" required>
                                <option value="" disabled>-- Pilih Jenis Obat --</option>
                                <option value="Tablet" {{ old('jenis_obat', $obat->jenis_obat) == 'Tablet' ? 'selected' : '' }}>Tablet</option>
                                <option value="Sirup" {{ old('jenis_obat', $obat->jenis_obat) == 'Sirup' ? 'selected' : '' }}>Sirup</option>
                                <option value="Kapsul" {{ old('jenis_obat', $obat->jenis_obat) == 'Kapsul' ? 'selected' : '' }}>Kapsul</option>
                                <option value="Salep" {{ old('jenis_obat', $obat->jenis_obat) == 'Salep' ? 'selected' : '' }}>Salep</option>
                                <option value="Cair" {{ old('jenis_obat', $obat->jenis_obat) == 'Cair' ? 'selected' : '' }}>Cair</option>
                            </select>
                        </div>

                        {{-- Stok --}}
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Stok Saat Ini</label>
                            <input type="number" name="stok" class="form-control bg-light @error('stok') is-invalid @enderror" value="{{ old('stok', $obat->stok) }}" required>
                        </div>

                        {{-- Satuan --}}
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Satuan</label>
                            <input type="text" name="satuan" class="form-control bg-light @error('satuan') is-invalid @enderror" value="{{ old('satuan', $obat->satuan) }}" placeholder="Contoh: Strip, Botol, Pcs" required>
                        </div>

                        {{-- Keterangan (Opsional) --}}
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Keterangan</label>
                            <textarea name="keterangan" class="form-control bg-light" rows="3">{{ old('keterangan', $obat->keterangan) }}</textarea>
                        </div>
                    </div>

                    <div class="mt-5 pt-3 border-top d-flex justify-content-end gap-2">
                        <a href="{{ route('obat.index') }}" class="btn btn-light border px-4 rounded-3">Batal</a>
                        <button type="submit" class="btn btn-warning px-4 fw-bold shadow-sm rounded-3 text-dark">
                            <i class="bi bi-arrow-repeat me-1"></i> Update Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
