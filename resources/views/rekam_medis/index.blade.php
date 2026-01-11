@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="color: var(--text-dark)">Riwayat Rekam Medis</h4>
            <p class="text-muted small">Daftar pemeriksaan pasien yang telah tercatat di sistem.</p>
        </div>
        <a href="{{ route('rekam-medis.create') }}" class="btn btn-primary shadow-sm px-4">
            <i class="bi bi-plus-lg me-2"></i> Periksa Pasien Baru
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">No</th>
                            <th>Tgl Periksa</th>
                            <th>Pasien</th>
                            <th>Dokter</th>
                            <th>Diagnosa</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($rekamMedis as $rm)
                        <tr>
                            <td class="ps-4 text-muted">{{ $loop->iteration }}</td>
                            <td>
                                <div class="fw-bold">{{ \Carbon\Carbon::parse($rm->tgl_pemeriksaan)->format('d M Y') }}</div>
                            </td>
                            <td>
                                <div class="fw-bold">{{ $rm->pasien?->nama_pasien ?? 'Pasien Tidak Ada' }}</div>
                                <small class="text-muted">ID: #P-{{ $rm->pasien_id }}</small>
                            </td>
                            <td>
                                <span class="badge bg-light text-success border border-success-subtle px-2 py-1">
                                    Dr. {{ $rm->dokter?->nama_dokter ?? 'Dokter Tidak Ada' }}
                                </span>
                            </td>
                            <td>
                                <span class="text-truncate d-inline-block" style="max-width: 150px;">
                                    {{ $rm->diagnosa }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="btn-group gap-2">
                                    <a href="{{ route('rekam-medis.show', $rm->id) }}" class="btn btn-sm btn-info shadow-sm">
                                        <i class="bi bi-eye-fill"></i> Detail
                                    </a>
                                    <form action="{{ route('rekam-medis.destroy', $rm->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger shadow-sm" onclick="return confirm('Hapus data ini?')">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-folder-x fs-1 d-block mb-3 opacity-25"></i>
                                Belum ada data rekam medis yang tersedia.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
