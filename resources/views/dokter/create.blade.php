@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dokter.index') }}" class="text-decoration-none" style="color: var(--tosca-primary)">Daftar Dokter</a></li>
                <li class="breadcrumb-item active fw-semibold" aria-current="page">Tambah Dokter Baru</li>
            </ol>
        </nav>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-header py-3" style="background-color: var(--tosca-primary); border: none;">
                <h5 class="card-title text-white mb-0 fw-bold">
                    <i class="bi bi-person-plus-fill me-2"></i> Registrasi Dokter Baru
                </h5>
            </div>

            <div class="card-body p-4 bg-white">
                <form action="{{ route('dokter.store') }}" method="POST">
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">Nama Lengkap Dokter</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-person text-muted"></i></span>
                                <input type="text" name="nama_dokter" class="form-control bg-light border-start-0 @error('nama_dokter') is-invalid @enderror"
                                       placeholder="dr. Siapa Nama Beliau?" value="{{ old('nama_dokter') }}" required>
                            </div>
                            @error('nama_dokter') <div class="small text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">Spesialisasi</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-stethoscope text-muted"></i></span>
                                <input type="text" name="spesialis" class="form-control bg-light border-start-0 @error('spesialis') is-invalid @enderror"
                                       placeholder="Contoh: Spesialis Anak" value="{{ old('spesialis') }}" required>
                            </div>
                            @error('spesialis') <div class="small text-danger mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="form-label fw-bold text-dark">Nomor Telepon / WhatsApp</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-whatsapp text-muted"></i></span>
                                <input type="text" name="no_telp" class="form-control bg-light border-start-0 @error('no_telp') is-invalid @enderror"
                                       placeholder="0812xxxx" value="{{ old('no_telp') }}" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold text-dark">Alamat Praktik</label>
                            <textarea name="alamat" class="form-control bg-light" rows="3" placeholder="Alamat lengkap tempat praktik..." required>{{ old('alamat') }}</textarea>
                        </div>
                    </div>

                    <div class="mt-5 pt-3 border-top d-flex justify-content-end gap-2">
                        <a href="{{ route('dokter.index') }}" class="btn btn-light px-4 border rounded-3 fw-semibold">Batal</a>
                        <button type="submit" class="btn btn-primary px-4 shadow-sm fw-bold rounded-3">
                            <i class="bi bi-save me-1"></i> Simpan Data Dokter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
