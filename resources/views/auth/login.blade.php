@extends('layouts.app')

@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 85vh; background: #f0fdfa;">
    <div class="col-md-5 col-lg-4">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="col-12 p-4 text-center" style="background-color: var(--tosca-primary);">
                <div class="mb-2 fs-1 text-white"><i class="bi bi-shield-lock-fill"></i></div>
                <h4 class="fw-bold text-white mb-1">Tosca Medica</h4>
                <p class="small text-white opacity-75 mb-0">Sistem Rekam Medis Terpadu</p>
            </div>

            <div class="card-body p-4 p-md-5 bg-white">
                @if(session('error'))
                    <div class="alert alert-danger border-0 small shadow-sm mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Alamat Email</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0 text-muted">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" name="email"
                                   class="form-control bg-light border-0 @error('email') is-invalid @enderror"
                                   placeholder="admin@tosca.com" value="{{ old('email') }}" required autofocus>
                        </div>
                        @error('email')
                            <span class="text-danger small" style="font-size: 0.75rem;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-0 text-muted">
                                <i class="bi bi-lock"></i>
                            </span>
                            <input type="password" name="password"
                                   class="form-control bg-light border-0 @error('password') is-invalid @enderror"
                                   placeholder="••••••••" required>
                        </div>
                        @error('password')
                            <span class="text-danger small" style="font-size: 0.75rem;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary py-2 fw-bold shadow-sm rounded-3">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Masuk Ke Sistem
                        </button>
                    </div>

                    <div class="text-center mt-4 pt-2 border-top">
                        <p class="small text-muted mb-0">Belum punya akun?
                            <a href="{{ route('register') }}" class="fw-bold text-decoration-none" style="color: var(--tosca-primary);">Daftar</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
        <p class="text-center text-muted mt-4 small opacity-50">
            &copy; {{ date('Y') }} Kelompok 3 - Klinik Pratama
        </p>
    </div>
</div>
@endsection
