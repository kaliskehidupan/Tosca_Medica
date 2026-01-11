@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-header py-3" style="background-color: #fefce8; border-bottom: 1px solid #fef08a;">
                <h5 class="mb-0 fw-bold" style="color: #854d0e;"><i class="bi bi-pencil-square me-2"></i>Edit Data Obat</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('obat.update', $obat->id) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="row g-4">
                        <div class="col-md-12">
                            <label class="form-label fw-bold">Nama Obat</label>
                            <input type="text" name="nama_obat" class="form-control bg-light" value="{{ $obat->nama_obat }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Stok Saat Ini</label>
                            <input type="number" name="stok" class="form-control bg-light" value="{{ $obat->stok }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Satuan</label>
                            <input type="text" name="satuan" class="form-control bg-light" value="{{ $obat->satuan }}" required>
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
