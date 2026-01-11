@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <h3 class="fw-bold" style="color: var(--text-dark)">
                <i class="bi bi-people-fill me-2" style="color: var(--tosca-primary)"></i>Daftar Pasien
            </h3>
            <p class="text-muted mb-0">Manajemen data pasien dan riwayat pemeriksaan.</p>
        </div>
        <div class="col-md-6 text-md-end mt-3 mt-md-0">
            <a href="{{ route('pasien.create') }}" class="btn btn-primary shadow-sm px-4 py-2">
                <i class="bi bi-person-plus-fill me-1"></i> Tambah Pasien Baru
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show rounded-4">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background-color: var(--tosca-light);">
                        <tr>
                            <th class="ps-4 py-3 text-uppercase small fw-bold" style="color: var(--tosca-primary)">No</th>
                            <th class="py-3 text-uppercase small fw-bold" style="color: var(--tosca-primary)">NIK</th>
                            <th class="py-3 text-uppercase small fw-bold" style="color: var(--tosca-primary)">Nama Pasien</th>
                            <th class="py-3 text-uppercase small fw-bold" style="color: var(--tosca-primary)">L/P</th>
                            <th class="py-3 text-uppercase small fw-bold" style="color: var(--tosca-primary)">Tgl Lahir</th>
                            <th class="text-center pe-4 py-3 text-uppercase small fw-bold" style="color: var(--tosca-primary)">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pasiens as $index => $pasien)
                        <tr>
                            <td class="ps-4 text-muted fw-bold">
                                {{ ($pasiens->currentPage()-1) * $pasiens->perPage() + $loop->iteration }}
                            </td>
                            <td><code class="fw-bold px-2 py-1 bg-light rounded text-dark">{{ $pasien->nik }}</code></td>
                            <td class="fw-bold text-dark">{{ $pasien->nama_pasien }}</td>
                            <td>
                                <span class="badge rounded-pill {{ $pasien->jenis_kelamin == 'L' ? 'bg-primary' : 'bg-danger' }} bg-opacity-10 {{ $pasien->jenis_kelamin == 'L' ? 'text-primary' : 'text-danger' }} px-3">
                                    {{ $pasien->jenis_kelamin }}
                                </span>
                            </td>
                            <td class="text-muted">{{ \Carbon\Carbon::parse($pasien->tgl_lahir)->format('d/m/Y') }}</td>
                            <td class="text-center pe-4">
                                <div class="btn-group gap-1">
                                    <a href="{{ route('pasien.show', $pasien->id) }}" class="btn btn-sm btn-info text-white rounded-2" title="Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-sm btn-warning rounded-2" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data pasien ini?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger rounded-2" title="Hapus"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-person-exclamation fs-1 d-block mb-2 opacity-25"></i>
                                Belum ada data pasien terdaftar.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-center">
        {{ $pasiens->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
