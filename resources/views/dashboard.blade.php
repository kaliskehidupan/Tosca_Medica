@extends('layouts.app')

@section('content')
<div class="container-fluid pb-5">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 bg-transparent">
                <div class="card-body p-0 d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="fw-bold text-dark mb-1">Selamat Datang, {{ Auth::user()->name }}! 👋</h4>
                        <p class="text-muted small mb-0">Sistem Informasi Rekam Medis Terpadu • {{ date('d M Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        @if(Auth::user()->role == 'superadmin')
            <div class="col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100" style="border-left: 5px solid #0d6efd !important;">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted small text-uppercase fw-bold mb-2">Total Akun Petugas</h6>
                                <h2 class="fw-bold mb-0 text-primary">{{ $countUser ?? 0 }}</h2>
                            </div>
                            <div class="bg-primary bg-opacity-10 p-3 rounded-3">
                                <i class="bi bi-people-fill text-primary fs-3"></i>
                            </div>
                        </div>
                        <a href="{{ route('users.index') }}" class="btn btn-link btn-sm p-0 mt-3 text-decoration-none fw-bold">Kelola User →</a>
                    </div>
                </div>
            </div>
        @else
            <div class="col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100" style="border-left: 5px solid #0dcaf0 !important;">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted small text-uppercase fw-bold mb-2">Pasien Terdaftar</h6>
                                <h2 class="fw-bold mb-0 text-info">{{ $countPasien ?? 0 }}</h2>
                            </div>
                            <div class="bg-info bg-opacity-10 p-3 rounded-3 text-info">
                                <i class="bi bi-person-bounding-box fs-3"></i>
                            </div>
                        </div>
                        <a href="{{ route('pasien.index') }}" class="btn btn-link btn-sm p-0 mt-3 text-decoration-none fw-bold text-info">Lihat Semua →</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card border-0 shadow-sm h-100" style="border-left: 5px solid #198754 !important;">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-muted small text-uppercase fw-bold mb-2">Rekam Medis Hari Ini</h6>
                                <h2 class="fw-bold mb-0 text-success">{{ $countRM ?? 0 }}</h2>
                            </div>
                            <div class="bg-success bg-opacity-10 p-3 rounded-3 text-success">
                                <i class="bi bi-clipboard2-pulse-fill fs-3"></i>
                            </div>
                        </div>
                        <p class="text-muted small mt-3 mb-0">Update terakhir: Just now</p>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="row g-4 text-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 h-100 bg-white">
                <div class="card-body p-5">
                    <img src="https://illustrations.popsy.co/blue/medical-checkup.svg" alt="Welcome" style="height: 200px;" class="mb-4">
                    <h5 class="fw-bold">Ringkasan Aktivitas Medis</h5>
                    <p class="text-muted mx-auto" style="max-width: 500px;">
                        Gunakan menu navigasi untuk mengelola data pasien, rekam medis, dan dokter. Sistem ini dirancang untuk efisiensi pelayanan klinik Anda.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 text-start">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-header bg-white py-3 border-0">
                    <h6 class="fw-bold mb-0">Akses Cepat</h6>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <a href="{{ route('pasien.create') }}" class="list-group-item list-group-item-action border-0 px-0 d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 me-3">
                                <i class="bi bi-person-plus"></i>
                            </div>
                            Registrasi Pasien Baru
                        </a>
                        <a href="#" class="list-group-item list-group-item-action border-0 px-0 d-flex align-items-center">
                            <div class="bg-warning bg-opacity-10 text-warning rounded-circle p-2 me-3">
                                <i class="bi bi-file-medical"></i>
                            </div>
                            Input Rekam Medis
                        </a>
                        <a href="{{ route('logout') }}"
                        class="list-group-item list-group-item-action border-0 px-0 d-flex align-items-center"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <div class="bg-danger bg-opacity-10 text-danger rounded-circle p-2 me-3">
                                <i class="bi bi-box-arrow-right"></i>
                            </div>
                            Keluar dari Sistem
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
