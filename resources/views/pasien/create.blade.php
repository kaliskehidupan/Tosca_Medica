@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small">
                <li class="breadcrumb-item"><a href="{{ route('pasien.index') }}" class="text-decoration-none text-muted">Daftar Pasien</a></li>
                <li class="breadcrumb-item active fw-bold" style="color: var(--tosca-primary)">Tambah Pasien Baru</li>
            </ol>
        </nav>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-header py-3" style="background-color: var(--tosca-primary);">
                <h5 class="card-title text-white mb-0 fw-bold">
                    <i class="bi bi-person-plus-fill me-2"></i> Form Registrasi Pasien Baru
                </h5>
            </div>

            <div class="card-body p-4 bg-white">
                <form action="{{ route('pasien.store') }}" method="POST">
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">Nomor Induk Kependudukan (NIK)</label>
                            <input type="text" name="nik" class="form-control bg-light border-0 shadow-none @error('nik') is-invalid @enderror"
                                   placeholder="Contoh: 3201..." value="{{ old('nik') }}" required>
                            @error('nik') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">Nama Lengkap Pasien</label>
                            <input type="text" name="nama_pasien" class="form-control bg-light border-0 shadow-none @error('nama_pasien') is-invalid @enderror"
                                   placeholder="Masukkan nama sesuai KTP" value="{{ old('nama_pasien') }}" required>
                            @error('nama_pasien') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">Jenis Kelamin</label>
                            <div class="d-flex gap-4 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="L" value="L" checked>
                                    <label class="form-check-label" for="L">Laki-laki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="P" value="P">
                                    <label class="form-check-label" for="P">Perempuan</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control bg-light border-0 shadow-none @error('tgl_lahir') is-invalid @enderror"
                                   value="{{ old('tgl_lahir') }}" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold small text-muted">Alamat Domisili</label>
                            <textarea name="alamat" class="form-control bg-light border-0 shadow-none @error('alamat') is-invalid @enderror"
                                      rows="3" placeholder="Jl. Nama Jalan, No. Rumah, RT/RW..." required>{{ old('alamat') }}</textarea>
                        </div>
                    </div>

                    <div class="mt-5 pt-3 border-top d-flex justify-content-end gap-2">
                        <a href="{{ route('pasien.index') }}" class="btn btn-light px-4 border rounded-3">Batal</a>
                        <button type="submit" class="btn btn-primary px-4 shadow-sm fw-bold rounded-3">
                            <i class="bi bi-save me-1"></i> Simpan Data Pasien
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
