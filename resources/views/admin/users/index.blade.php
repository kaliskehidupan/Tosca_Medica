@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark">Manajemen User</h2>
                <p class="text-muted mb-0">Halaman khusus Superadmin untuk mengelola akses petugas.</p>
            </div>
            <a href="{{ route('users.create') }}" class="btn btn-primary shadow-sm px-4">
                <i class="bi bi-plus-lg"></i> + Tambah User Baru
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4 py-3">No</th>
                                <th class="py-3">Nama Lengkap</th>
                                <th class="py-3">Username (Email)</th>
                                <th class="py-3">Role</th>
                                <th class="pe-4 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $index => $user)
                            <tr>
                                <td class="ps-4 text-muted">{{ $index + 1 }}</td>
                                <td>
                                    <div class="fw-bold text-dark">{{ $user->name }}</div>
                                </td>
                                <td>{{ $user->email }}</td> <td>
                                    @if($user->role == 'superadmin')
                                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3">
                                            SUPERADMIN
                                        </span>
                                    @else
                                        <span class="badge bg-success-subtle text-success border border-success-subtle px-3">
                                            USER (PETUGAS)
                                        </span>
                                    @endif
                                </td>
                                <td class="pe-4 text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-warning">
                                            Edit
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                Hapus
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

        @if($users->isEmpty())
            <div class="text-center py-5">
                <p class="text-muted">Belum ada data user selain Anda.</p>
            </div>
        @endif
    </div>
</div>
@endsection
