@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                <div class="card-body p-4 text-center">
                    <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-4 shadow-sm"
                         style="width: 100px; height: 100px; background-color: var(--tosca-light); color: var(--tosca-primary);">
                        <i class="bi bi-person-vcard fs-1"></i>
                    </div>
                    <h4 class="fw-bold mb-1">{{ $pasien->nama_pasien }}</h4>
                    <span class="badge rounded-pill bg-light text-dark border px-3 mb-4">NIK: {{ $pasien->nik }}</span>

                    <div class="text-start border-top pt-4">
                        <div class="mb-3">
                            <small class="text-muted d-block fw-bold text-uppercase" style="font-size: 0.7rem;">Jenis Kelamin</small>
                            <span class="text-dark">{{ $pasien->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</span>
                        </div>
                        <div class="mb-3">
                            <small class="text-muted d-block fw-bold text-uppercase" style="font-size: 0.7rem;">Tanggal Lahir</small>
                            <span class="text-dark">{{ \Carbon\Carbon::parse($pasien->tgl_lahir)->format('d F Y') }}</span>
                        </div>
                        <div class="mb-0">
                            <small class="text-muted d-block fw-bold text-uppercase" style="font-size: 0.7rem;">Alamat</small>
                            <span class="text-dark small">{{ $pasien->alamat }}</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light border-0 p-3">
                    <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-warning w-100 fw-bold rounded-3">
                        <i class="bi bi-pencil-square me-1"></i> Edit Profil
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom">
                    <h5 class="mb-0 fw-bold" style="color: var(--tosca-primary)">Riwayat Rekam Medis</h5>
                    <a href="{{ route('pasien.index') }}" class="btn btn-outline-secondary btn-sm px-3 rounded-pill">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr class="small text-muted text-uppercase">
                                    <th class="ps-4">Tgl Periksa</th>
                                    <th>Keluhan</th>
                                    <th>Diagnosa</th>
                                    <th class="text-end pe-4">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pasien->rekamMedis as $rm)
                                <tr>
                                    <td class="ps-4">
                                        <span class="fw-bold text-dark">{{ \Carbon\Carbon::parse($rm->tgl_pemeriksaan)->format('d/m/Y') }}</span>
                                    </td>
                                    <td class="small">{{ Str::limit($rm->keluhan, 40) }}</td>
                                    <td class="small"><span class="badge bg-info bg-opacity-10 text-info fw-normal">{{ Str::limit($rm->diagnosa, 40) }}</span></td>
                                    <td class="text-end pe-4">
                                        <a href="{{ route('rekam-medis.show', $rm->id) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5 text-muted small italic">
                                        <img src="https://cdn-icons-png.flaticon.com/512/6598/6598519.png" width="60" class="opacity-25 d-block mx-auto mb-2">
                                        Belum ada riwayat pemeriksaan untuk pasien ini.
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
