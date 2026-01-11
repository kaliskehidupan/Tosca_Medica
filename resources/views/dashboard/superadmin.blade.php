@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h4 class="fw-bold" style="color: var(--text-dark)">Dashboard Administrator</h4>
            <p class="text-muted">Kelola akun petugas dan pantau akses sistem.</p>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                <div class="d-flex align-items-center">
                    <div class="p-3 rounded-4 me-3" style="background-color: var(--tosca-light)">
                        <i class="bi bi-people-fill fs-3" style="color: var(--tosca-primary)"></i>
                    </div>
                    <div>
                        <small class="text-muted fw-bold d-block mb-1">TOTAL PENGGUNA</small>
                        <h3 class="fw-bold mb-0">{{ $totalUser }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                <div class="d-flex align-items-center">
                    <div class="p-3 rounded-4 me-3" style="background-color: #f0fdfa">
                        <i class="bi bi-shield-check fs-3" style="color: #2dd4bf"></i>
                    </div>
                    <div>
                        <small class="text-muted fw-bold d-block mb-1">SUPER ADMIN</small>
                        <h3 class="fw-bold mb-0">{{ $totalAdmin }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                <div class="d-flex align-items-center">
                    <div class="p-3 rounded-4 me-3" style="background-color: #fefce8">
                        <i class="bi bi-person-badge fs-3" style="color: #fbbf24"></i>
                    </div>
                    <div>
                        <small class="text-muted fw-bold d-block mb-1">TOTAL PETUGAS</small>
                        <h3 class="fw-bold mb-0">{{ $totalPetugas }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                <h6 class="fw-bold mb-4">Perbandingan Role User</h6>
                <div style="position: relative; height:300px;">
                    <canvas id="userPieChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const colorTosca = '#5ec2b7';
    const colorOrange = '#fbbf24';

    new Chart(document.getElementById('userPieChart'), {
        type: 'pie',
        data: {
            labels: ['Super Admin', 'Petugas'],
            datasets: [{
                data: [{{ $totalAdmin }}, {{ $totalPetugas }}],
                backgroundColor: [colorTosca, colorOrange],
                borderWidth: 0
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom' } }
        }
    });
</script>
@endsection
