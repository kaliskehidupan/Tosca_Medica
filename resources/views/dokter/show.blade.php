@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center" style="background-color: var(--tosca-primary); border: none;">
                    <h5 class="text-white mb-0 fw-bold"><i class="bi bi-person-badge me-2"></i>Profil Detail Dokter</h5>
                    <a href="{{ route('dokter.index') }}" class="btn btn-sm btn-light rounded-3 px-3 fw-bold">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
                <div class="card-body p-4 bg-white">
                    <div class="row align-items-center mb-4">
                        <div class="col-md-3 text-center mb-3 mb-md-0">
                            <div class="rounded-4 d-flex align-items-center justify-content-center mx-auto mb-3 shadow-sm"
                                 style="width: 150px; height: 150px; background-color: var(--bg-light);">
                                <i class="bi bi-person-vcard text-primary" style="font-size: 5rem; color: var(--tosca-primary) !important;"></i>
                            </div>
                            <h5 class="fw-bold mb-1">{{ $dokter->nama_dokter }}</h5>
                            <span class="badge px-3 py-2 rounded-pill" style="background-color: var(--tosca-light); color: var(--tosca-primary);">
                                {{ $dokter->spesialis }}
                            </span>
                        </div>
                        <div class="col-md-9 border-start-md ps-md-5">
                            <h6 class="fw-bold text-muted text-uppercase small mb-4">Informasi Kontak & Alamat</h6>
                            <div class="row g-3">
                                <div class="col-sm-4 fw-bold text-dark">Nomor Telepon</div>
                                <div class="col-sm-8 text-muted">: {{ $dokter->no_telp }}</div>

                                <div class="col-sm-4 fw-bold text-dark">Alamat Praktik</div>
                                <div class="col-sm-8 text-muted">: {{ $dokter->alamat }}</div>

                                <div class="col-sm-4 fw-bold text-dark">Terdaftar Sejak</div>
                                <div class="col-sm-8 text-muted">: {{ $dokter->created_at->format('d F Y') }}</div>
                            </div>
                        </div>
                    </div>

                    <hr class="opacity-50">

                    <h6 class="fw-bold mb-4 mt-4" style="color: var(--text-dark)">
                        <i class="bi bi-clock-history me-2 text-warning"></i>Riwayat Penanganan Pasien
                    </h6>
                    <div class="table-responsive rounded-3 border">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-3">Tanggal</th>
                                    <th>Nama Pasien</th>
                                    <th>Diagnosa Akhir</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($dokter->rekamMedis as $rekam)
                                <tr>
                                    <td class="ps-3">{{ \Carbon\Carbon::parse($rekam->tgl_pemeriksaan)->format('d/m/Y') }}</td>
                                    <td class="fw-bold">{{ $rekam->pasien->nama_pasien }}</td>
                                    <td>{{ Str::limit($rekam->diagnosa, 50) }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('rekam-medis.show', $rekam->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                            Lihat Detail
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4 small">
                                        <i class="bi bi-info-circle me-1"></i> Dokter ini belum memiliki riwayat penanganan pasien.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
