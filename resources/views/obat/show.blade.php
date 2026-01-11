@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-header py-3 d-flex justify-content-between align-items-center" style="background-color: var(--tosca-primary);">
                <h5 class="card-title text-white mb-0 fw-bold">
                    <i class="bi bi-info-circle-fill me-2"></i> Detail Informasi Obat
                </h5>
                <a href="{{ route('obat.index') }}" class="btn btn-sm btn-light rounded-3 px-3 fw-bold"> Kembali</a>
            </div>

            <div class="card-body p-4 bg-white text-center">
                <div class="mb-5">
                    <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3 shadow-sm"
                         style="width: 100px; height: 100px; background-color: var(--bg-light);">
                        <i class="bi bi-capsule" style="font-size: 3rem; color: var(--tosca-primary);"></i>
                    </div>
                    <h3 class="fw-bold text-dark mb-1">{{ $obat->nama_obat }}</h3>
                    <span class="badge px-3 py-2 rounded-pill" style="background-color: var(--tosca-light); color: var(--tosca-primary);">
                        {{ $obat->jenis_obat }}
                    </span>
                </div>

                <div class="row g-4 text-start justify-content-center">
                    <div class="col-md-10">
                        <div class="row border-bottom py-2">
                            <div class="col-6 text-muted fw-semibold">Stok Tersedia:</div>
                            <div class="col-6 fw-bold">
                                <span class="{{ $obat->stok < 10 ? 'text-danger' : 'text-success' }}">
                                    {{ $o->stok ?? $obat->stok }} {{ $obat->satuan }}
                                </span>
                            </div>
                        </div>
                        <div class="row border-bottom py-2">
                            <div class="col-6 text-muted fw-semibold">Satuan:</div>
                            <div class="col-6 text-dark fw-medium">{{ $obat->satuan }}</div>
                        </div>
                        <div class="row border-bottom py-2">
                            <div class="col-6 text-muted fw-semibold">Terdaftar Pada:</div>
                            <div class="col-6 text-dark fw-medium">{{ $obat->created_at->format('d M Y, H:i') }}</div>
                        </div>

                        <div class="mt-4">
                            <div class="p-3 rounded-3" style="background-color: var(--bg-light); border-left: 4px solid var(--tosca-primary);">
                                <small class="text-uppercase fw-bold mb-1 d-block" style="color: var(--tosca-primary); font-size: 0.7rem;">Keterangan / Kegunaan:</small>
                                <p class="mb-0 text-dark small" style="font-style: italic;">
                                    {{ $obat->keterangan ?? 'Tidak ada keterangan tambahan.' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5 pt-3 border-top">
                    <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-warning px-5 fw-bold shadow-sm rounded-pill">
                        <i class="bi bi-pencil-square me-1"></i> Edit Data
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
