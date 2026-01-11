@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold" style="color: var(--text-dark)">
                <i class="bi bi-capsule me-2" style="color: var(--tosca-primary)"></i>Inventaris Obat
            </h3>
            <p class="text-muted mb-0">Kelola stok dan jenis obat-obatan apotek.</p>
        </div>
        <a href="{{ route('obat.create') }}" class="btn btn-primary shadow-sm px-4">
            <i class="bi bi-plus-circle me-2"></i>Tambah Obat
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background-color: var(--tosca-light);">
                        <tr>
                            <th class="ps-4 py-3 text-uppercase small fw-bold" style="color: var(--tosca-primary)">Nama Obat</th>
                            <th class="py-3 text-uppercase small fw-bold" style="color: var(--tosca-primary)">Jenis</th>
                            <th class="py-3 text-uppercase small fw-bold" style="color: var(--tosca-primary)">Stok</th>
                            <th class="py-3 text-uppercase small fw-bold" style="color: var(--tosca-primary)">Satuan</th>
                            <th class="text-center pe-4 py-3 text-uppercase small fw-bold" style="color: var(--tosca-primary)">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($obats as $o)
                        <tr>
                            <td class="ps-4 fw-bold text-dark">{{ $o->nama_obat }}</td>
                            <td><span class="text-muted">{{ $o->jenis_obat }}</span></td>
                            <td>
                                @if($o->stok < 10)
                                    <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill">
                                        <i class="bi bi-exclamation-triangle me-1"></i> {{ $o->stok }} (Hampir Habis)
                                    </span>
                                @else
                                    <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">
                                        {{ $o->stok }}
                                    </span>
                                @endif
                            </td>
                            <td class="text-muted">{{ $o->satuan }}</td>
                            <td class="text-center pe-4">
                                <div class="btn-group gap-1">
                                    <a href="{{ route('obat.show', $o->id) }}" class="btn btn-sm btn-info text-white rounded-2" title="Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('obat.edit', $o->id) }}" class="btn btn-sm btn-warning rounded-2" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('obat.destroy', $o->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger rounded-2" onclick="return confirm('Hapus obat ini?')" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
