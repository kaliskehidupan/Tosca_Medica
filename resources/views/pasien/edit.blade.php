@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb small">
                <li class="breadcrumb-item"><a href="{{ route('pasien.index') }}" class="text-decoration-none text-muted">Daftar Pasien</a></li>
                <li class="breadcrumb-item active fw-bold" style="color: var(--tosca-primary)">Edit Data Pasien</li>
            </ol>
        </nav>

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-header py-3" style="background-color: #fefce8; border-bottom: 1px solid #fef08a;">
                <h5 class="card-title mb-0 fw-bold" style="color: #854d0e;">
                    <i class="bi bi-pencil-square me-2"></i> Edit Informasi Pasien
                </h5>
            </div>

            <div class="card-body p-4 bg-white">
                <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">NIK (Tidak dapat diubah)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0"><i class="bi bi-card-text text-muted"></i></span>
                                <input type="text" class="form-control bg-light border-0 shadow-none"
                                       value="{{ $pasien->nik }}" readonly disabled>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">Nama Lengkap Pasien</label>
                            <input type="text" name="nama_pasien" class="form-control bg-light border-0 shadow-none @error('nama_pasien') is-invalid @enderror"
                                   value="{{ old('nama_pasien', $pasien->nama_pasien) }}" required>
                            @error('nama_pasien') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">Jenis Kelamin</label>
                            <div class="d-flex gap-4 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="L" value="L"
                                        {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'L' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="L">Laki-laki</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="P" value="P"
                                        {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'P' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="P">Perempuan</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control bg-light border-0 shadow-none @error('tgl_lahir') is-invalid @enderror"
                                   value="{{ old('tgl_lahir', $pasien->tgl_lahir) }}" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label fw-bold small text-muted">Alamat Domisili</label>
                            <textarea name="alamat" class="form-control bg-light border-0 shadow-none @error('alamat') is-invalid @enderror"
                                      rows="3" required>{{ old('alamat', $pasien->alamat) }}</textarea>
                        </div>
                    </div>

                    <div class="mt-5 pt-3 border-top d-flex justify-content-end gap-2">
                        <a href="{{ route('pasien.index') }}" class="btn btn-light px-4 border rounded-3">Batal</a>
                        <button type="submit" class="btn btn-warning px-4 shadow-sm fw-bold rounded-3 text-dark">
                            <i class="bi bi-arrow-repeat me-1"></i> Perbarui Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
