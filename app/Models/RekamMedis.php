<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;

    protected $table = 'rekam_medis'; // Pastikan nama tabel benar
    protected $fillable = ['pasien_id', 'dokter_id', 'tgl_pemeriksaan', 'keluhan', 'diagnosa', 'tindakan'];

    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }

    public function dokter() {
        return $this->belongsTo(Dokter::class);
    }

    public function obats() {
        return $this->belongsToMany(Obat::class, 'obat_rekam_medis');
    }
}
