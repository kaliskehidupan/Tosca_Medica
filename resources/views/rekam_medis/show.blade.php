@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="mb-4">
        <a href="{{ route('rekam-medis.index') }}" class="text-decoration-none text-muted">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
        </a>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-4 p-4 mb-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold mb-0" style="color: var(--tosca-primary)">Hasil Pemeriksaan Medis</h5>
                    <span class="badge p-2 px-3" style="background-color: var(--tosca-light); color: var(--tosca-primary)">
                        ID Rekam: #RM-{{ $rm->id }}
                    </span>
                </div>

                <div class="row mb-4">
                    <div class="col-6">
                        <small class="text-muted d-block">Keluhan Pasien:</small>
                        <p class="fw-semibold">{{ $rm->keluhan }}</p>
                    </div>
                    <div class="col-6">
                        <small class="text-muted d-block">Diagnosa Dokter:</small>
                        <p class="fw-bold text-danger">{{ $rm->diagnosa }}</p>
                    </div>
                </div>

                <div class="mb-4">
                    <small class="text-muted d-block">Tindakan Medis:</small>
                    <p>{{ $rm->tindakan }}</p>
                </div>

                <hr class="opacity-50">

                <h6 class="fw-bold mb-3"><i class="bi bi-capsule me-2"></i>Resep Obat:</h6>
                <div class="d-flex flex-wrap gap-2">
                    @foreach($rm->obats as $obat)
                        <span class="badge bg-white border text-dark p-2 rounded-3">
                            {{ $obat->nama_obat }} ({{ $obat->jenis_obat }})
                        </span>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 mb-3" style="background-color: var(--tosca-primary); color: white;">
                <h6 class="fw-bold mb-3">Informasi Pasien</h6>
                <p class="mb-1 opacity-75 small">Nama Lengkap</p>
                <h5 class="fw-bold mb-3">{{ $rm->pasien->nama_pasien }}</h5>
                <p class="mb-1 opacity-75 small">Dokter Pemeriksa</p>
                <h5 class="fw-bold">{{ $rm->dokter->nama_dokter }}</h5>
            </div>
        </div>
    </div>
</div>
@endsection
