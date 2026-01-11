@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center mt-5">
            <div class="card border-0 shadow-sm p-5 rounded-4 bg-white">
                <div class="mb-4">
                    <i class="bi bi-arrow-repeat fs-1 text-primary spin-icon"></i>
                </div>
                <h3 class="fw-bold">Memuat Dashboard...</h3>
                <p class="text-muted">Sistem sedang menyiapkan data sesuai dengan hak akses Anda ({{ Auth::user()->role }}).</p>
                <div class="mt-3">
                    @if(Auth::user()->role == 'superadmin')
                        <a href="{{ route('users.index') }}" class="btn btn-primary px-4 py-2 rounded-3">Ke Manajemen User</a>
                    @else
                        <a href="{{ route('pasien.index') }}" class="btn btn-primary px-4 py-2 rounded-3">Ke Data Pasien</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .spin-icon {
        display: inline-block;
        animation: spin 2s linear infinite;
    }
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
@endsection
