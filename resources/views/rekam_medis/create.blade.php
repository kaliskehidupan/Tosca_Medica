@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card border-0 shadow-sm rounded-4 p-4">
        <h5 class="fw-bold mb-4" style="color: var(--tosca-primary)">Tambah Rekam Medis Baru</h5>

        <form action="{{ route('rekam-medis.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Pilih Pasien</label>
                    <select name="pasien_id" class="form-select rounded-3">
                        @foreach($pasiens as $p)
                            <option value="{{ $p->id }}">{{ $p->nama_pasien }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Pilih Dokter</label>
                    <select name="dokter_id" class="form-select rounded-3">
                        @foreach($dokters as $d)
                            <option value="{{ $d->id }}">{{ $d->nama_dokter }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Pilih Obat (Bisa pilih banyak)</label>
                <select name="obats[]" class="form-select rounded-3 select2" multiple>
                    @foreach($obats as $o)
                        <option value="{{ $o->id }}">{{ $o->nama_obat }} ({{ $o->jenis_obat }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Keluhan</label>
                <textarea name="keluhan" class="form-control rounded-3" rows="3"></textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Diagnosa</label>
                    <input type="text" name="diagnosa" class="form-control rounded-3">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Tanggal Periksa</label>
                    <input type="date" name="tgl_pemeriksaan" class="form-control rounded-3" value="{{ date('Y-m-d') }}">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Tindakan</label>
                <textarea name="tindakan" class="form-control rounded-3" rows="2"></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-3">Simpan Rekam Medis</button>
        </form>
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: " Klik untuk pilih obat",
            allowClear: true
        });
    });
</script>
@endsection
