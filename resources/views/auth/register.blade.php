@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            {{-- Card Utama --}}
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                {{-- Header dengan warna tema Tosca/Medis --}}
                <div class="card-header py-4 text-center" style="background-color: #f0fdfa; border-bottom: 1px solid #ccfbf1;">
                    <h3 class="fw-bold mb-0" style="color: #0d9488;">Daftar Akun</h3>
                    <p class="text-muted small mb-0">Silakan lengkapi data untuk mendaftar</p>
                </div>

                <div class="card-body p-4">
                    {{-- Alert Error --}}
                    @if ($errors->any())
                        <div class="alert alert-danger py-2 shadow-sm">
                            <ul class="mb-0 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- Input Nama --}}
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold small">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-person"></i></span>
                                <input id="name" type="text" name="name" value="{{ old('name') }}"
                                    class="form-control bg-light border-start-0 @error('name') is-invalid @enderror"
                                    placeholder="Masukkan nama Anda" required autofocus>
                            </div>
                        </div>

                        {{-- Input Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold small">Alamat Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope"></i></span>
                                <input id="email" type="email" name="email" value="{{ old('email') }}"
                                    class="form-control bg-light border-start-0 @error('email') is-invalid @enderror"
                                    placeholder="email@contoh.com" required>
                            </div>
                        </div>

                        {{-- Input Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold small">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock"></i></span>
                                <input id="password" type="password" name="password"
                                    class="form-control bg-light border-start-0 @error('password') is-invalid @enderror"
                                    placeholder="Minimal 8 karakter" required>
                            </div>
                        </div>

                        {{-- Input Confirm Password --}}
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-bold small">Konfirmasi Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-shield-check"></i></span>
                                <input id="password_confirmation" type="password" name="password_confirmation"
                                    class="form-control bg-light border-start-0"
                                    placeholder="Ulangi password" required>
                            </div>
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-info text-white fw-bold py-2 shadow-sm rounded-3" style="background-color: #0d9488; border: none;">
                                <i class="bi bi-person-plus-fill me-2"></i>Daftar Sekarang
                            </button>
                            <a href="{{ route('login') }}" class="btn btn-link btn-sm text-decoration-none text-teal mt-2">
                                Sudah punya akun? <span class="fw-bold">Login di sini</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Footer kecil --}}
            <div class="text-center mt-4 text-muted small">
                &copy; 2026 Tosca Medica - Sistem Rekam Medis
            </div>
        </div>
    </div>
</div>

<style>
    .text-teal { color: #0d9488; }
    .form-control:focus, .form-select:focus {
        border-color: #0d9488;
        box-shadow: 0 0 0 0.25rem rgba(13, 148, 136, 0.25);
    }
</style>
@endsection
