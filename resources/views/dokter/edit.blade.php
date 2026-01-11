@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dokter.index') }}" class="text-decoration-none" style="color: var(--tosca-primary)">Daftar Dokter</a></li>
                <li class="breadcrumb-item active fw-semibold">Edit Data Dokter</li>
            </ol>
        </nav>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-header py-3" style="background-color: #fefce8; border-bottom: 1px solid #fef08a;">
                <h5 class="card-title mb-0 fw-bold" style="color: #854d0e;">
                    <i class="bi bi-pencil-square me-2"></i> Perbarui Informasi Dokter
                </h5>
            </div>

            <div class="card-body p-4 bg-white">
                <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">Nama Dokter</label>
                            <input type="text" name="nama_dokter" class="form-control bg-light" value="{{ old('nama_dokter', $dokter->nama_dokter) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">Spesialis</label>
                            <input type="text" name="spesialis" class="form-control bg-light" value="{{ old('spesialis', $dokter->spesialis) }}" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-bold text-dark">Nomor Telepon</label>
                            <input type="text" name="no_telp" class="form-control bg-light" value="{{ old('no_telp', $dokter->no_telp) }}" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold text-dark">Alamat</label>
                            <textarea name="alamat" class="form-control bg-light" rows="3" required>{{ old('alamat', $dokter->alamat) }}</textarea>
                        </div>
                    </div>

                    <div class="mt-5 pt-3 border-top d-flex justify-content-end gap-2">
                        <a href="{{ route('dokter.index') }}" class="btn btn-light border px-4 rounded-3 fw-semibold">Batal</a>
                        <button type="submit" class="btn btn-warning px-4 fw-bold rounded-3 shadow-sm">
                            <i class="bi bi-check-circle me-1"></i> Update Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
