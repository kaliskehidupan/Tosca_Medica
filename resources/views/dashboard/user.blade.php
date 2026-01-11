@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h4 class="fw-bold" style="color: var(--text-dark)">Dashboard Analitik</h4>
            <p class="text-muted">Pantau data kesehatan dan inventaris obat secara real-time.</p>
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
                        <small class="text-muted fw-bold d-block mb-1">TOTAL PASIEN</small>
                        <h3 class="fw-bold mb-0">{{ $totalPasien }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                <div class="d-flex align-items-center">
                    <div class="p-3 rounded-4 me-3" style="background-color: #f0fdfa">
                        <i class="bi bi-person-badge-fill fs-3" style="color: #2dd4bf"></i>
                    </div>
                    <div>
                        <small class="text-muted fw-bold d-block mb-1">TOTAL DOKTER</small>
                        <h3 class="fw-bold mb-0">{{ $totalDokter }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 p-3 bg-white">
                <div class="d-flex align-items-center">
                    <div class="p-3 rounded-4 me-3" style="background-color: #fefce8">
                        <i class="bi bi-capsule fs-3" style="color: #fbbf24"></i>
                    </div>
                    <div>
                        <small class="text-muted fw-bold d-block mb-1">STOK OBAT</small>
                        <h3 class="fw-bold mb-0">{{ $totalObat }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card border-0 shadow-sm rounded-4 p-4 h-100">
                <h6 class="fw-bold mb-4" style="color: var(--text-dark)">Sebaran Jenis Obat</h6>
                <div style="position: relative; height:300px;">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($obatData->pluck('jenis_obat')) !!},
            datasets: [{
                label: 'Jumlah Produk',
                data: {!! json_encode($obatData->pluck('total')) !!},
                backgroundColor: '#5ec2b7',
                borderRadius: 12,
                barThickness: 35
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: { legend: { display: false } }
        }
    });
</script>
@endsection
