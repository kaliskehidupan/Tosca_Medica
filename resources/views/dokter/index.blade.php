@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <h3 class="fw-bold" style="color: var(--text-dark)">
                <i class="bi bi-person-badge-fill me-2" style="color: var(--tosca-primary)"></i>Daftar Tenaga Medis
            </h3>
            <p class="text-muted mb-0">Manajemen data dokter spesialis dan umum.</p>
        </div>
        <div class="col-md-6 text-md-end mt-3 mt-md-0">
            <a href="{{ route('dokter.create') }}" class="btn btn-primary shadow-sm px-4">
                <i class="bi bi-person-plus-fill me-1"></i> Tambah Dokter
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background-color: var(--tosca-light);">
                        <tr>
                            <th class="ps-4 py-3 text-uppercase small fw-bold" style="color: var(--tosca-primary); width: 80px;">No</th>
                            <th class="py-3 text-uppercase small fw-bold" style="color: var(--tosca-primary)">Nama Dokter</th>
                            <th class="py-3 text-uppercase small fw-bold" style="color: var(--tosca-primary)">Spesialis</th>
                            <th class="py-3 text-uppercase small fw-bold" style="color: var(--tosca-primary)">No. Telp</th>
                            <th class="text-center pe-4 py-3 text-uppercase small fw-bold" style="color: var(--tosca-primary)">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dokters as $index => $dokter)
                        <tr>
                            <td class="ps-4 fw-bold text-muted">{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-3 me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background-color: var(--bg-light); color: var(--tosca-primary);">
                                        <i class="bi bi-person-fill fs-5"></i>
                                    </div>
                                    <span class="fw-bold text-dark">{{ $dokter->nama_dokter }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="badge px-3 py-2 rounded-pill" style="background-color: var(--tosca-light); color: var(--tosca-primary);">
                                    {{ $dokter->spesialis }}
                                </span>
                            </td>
                            <td class="text-muted">
                                <i class="bi bi-telephone me-1"></i> {{ $dokter->no_telp }}
                            </td>
                            <td class="text-center pe-4">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('dokter.show', $dokter->id) }}" class="btn btn-info btn-sm" title="Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data dokter ini?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm" title="Hapus"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <img src="https://cdn-icons-png.flaticon.com/512/7486/7486744.png" width="100" class="opacity-25 mb-3">
                                <p class="text-muted">Belum ada data dokter yang terdaftar.</p>
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
