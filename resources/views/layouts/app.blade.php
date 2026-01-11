<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistem Rekam Medis - Medica</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --tosca-primary: #5ec2b7;
            --tosca-hover: #4da89f;
            --tosca-light: #e0f2f1;
            --bg-light: #f4fbfb;
            --text-dark: #2d4a47;
            --soft-red: #ff6b6b;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* --- SIDEBAR --- */
        .sidebar {
            width: 280px; height: 100vh; position: fixed;
            top: 0; left: 0; background-color: #ffffff;
            border-right: 1px solid rgba(94, 194, 183, 0.2);
            z-index: 1000; display: flex; flex-direction: column; padding: 20px 0;
        }

        .sidebar-header {
            padding: 20px; margin: 0 20px 30px 20px;
            background-color: var(--tosca-primary);
            border-radius: 24px; color: white; text-align: center;
        }

        .profile-img {
            width: 60px; height: 60px; border-radius: 18px;
            background: white; padding: 3px; margin-bottom: 12px; object-fit: cover;
        }

        .nav-link {
            color: #70928e; padding: 14px 20px; margin: 4px 20px;
            border-radius: 16px; display: flex; align-items: center;
            font-weight: 600; transition: 0.3s; text-decoration: none;
        }

        .nav-link i { font-size: 1.3rem; margin-right: 15px; }
        .nav-link:hover { color: var(--tosca-primary); background-color: var(--tosca-light); }
        .nav-link.active {
            background-color: var(--tosca-primary); color: white;
            box-shadow: 0 8px 15px rgba(94, 194, 183, 0.25);
        }

        /* --- LAYOUT --- */
        .main-content {
            margin-left: {{ Auth::check() ? '280px' : '0' }};
            padding: {{ Auth::check() ? '40px' : '0' }};
            transition: 0.3s;
        }

        .search-box {
            background: white; border-radius: 15px; padding: 10px 20px;
            border: 1px solid rgba(94, 194, 183, 0.1); display: flex; align-items: center; width: 350px;
        }
        .search-box input { border: none; outline: none; background: transparent; margin-left: 10px; width: 100%; }

        .btn-logout {
            margin-top: auto; margin-left: 20px; margin-right: 20px; padding: 14px;
            background: #fff0f0; color: var(--soft-red); text-align: center; border-radius: 16px;
            text-decoration: none; font-weight: 700; transition: 0.3s; border: none;
            cursor: pointer;
        }
        .btn-logout:hover { background: var(--soft-red); color: white; }

        .btn-primary {
            background-color: var(--tosca-primary) !important;
            border: none !important;
            border-radius: 14px !important;
            padding: 10px 24px !important;
            font-weight: 700 !important;
        }
    </style>
</head>
<body>

    @auth
    <div class="sidebar">
        <div class="px-4 mb-4 text-center">
            <h4 class="fw-bold" style="color: var(--tosca-primary) !important;">
                <i class="bi bi-heart-pulse-fill me-2"></i>Medica
            </h4>
        </div>

        <div class="sidebar-header shadow-sm">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=fff&color=5ec2b7&bold=true&length=1" class="profile-img">
            <h6 class="mb-0 fw-bold text-truncate">{{ Auth::user()->name }}</h6>
            <small class="opacity-75" style="font-size: 0.7rem;">
                {{ strtoupper(Auth::user()->role) }}
            </small>
        </div>

        <div class="flex-grow-1 overflow-auto">
            <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>

            {{-- MENU KHUSUS SUPERADMIN --}}
            @if(Auth::user()->role == 'superadmin')
            <div class="px-4 mt-4 mb-2 small fw-bold text-muted opacity-50">ADMINISTRATOR</div>
            <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i> Manajemen User
            </a>
            @endif

            {{-- MENU KHUSUS USER (PETUGAS) --}}
            @if(Auth::user()->role == 'user')
            <div class="px-4 mt-4 mb-2 small fw-bold text-muted opacity-50">MENU MEDIS</div>
            <a href="{{ route('pasien.index') }}" class="nav-link {{ Request::is('pasien*') ? 'active' : '' }}">
                <i class="bi bi-person-heart"></i> Data Pasien
            </a>
            <a href="{{ route('dokter.index') }}" class="nav-link {{ Request::is('dokter*') ? 'active' : '' }}">
                <i class="bi bi-person-badge"></i> Data Dokter
            </a>
            <a href="{{ route('obat.index') }}" class="nav-link {{ Request::is('obat*') ? 'active' : '' }}">
                <i class="bi bi-capsule"></i> Data Obat
            </a>
            <a href="{{ route('rekam-medis.index') }}" class="nav-link {{ Request::is('rekam-medis*') ? 'active' : '' }}">
                <i class="bi bi-journal-medical"></i> Rekam Medis
            </a>
            @endif
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
        <button type="button" class="btn-logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-power me-2"></i> Keluar Sistem
        </button>
    </div>
    @endauth

    <div class="main-content">
        @auth
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div class="search-box shadow-sm">
                <i class="bi bi-search text-muted"></i>
                <input type="text" placeholder="Cari data...">
            </div>
            <div class="d-flex gap-3">
                <div class="bg-white shadow-sm rounded-4 px-3 py-2 small fw-bold">
                    <i class="bi bi-calendar3 me-2 text-primary"></i> {{ date('d M Y') }}
                </div>
            </div>
        </div>
        @endauth

        @if (session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
