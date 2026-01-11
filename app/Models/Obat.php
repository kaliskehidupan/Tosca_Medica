<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $fillable = ['nama_obat', 'jenis_obat', 'stok', 'satuan', 'keterangan'];

    // Relasi ke Rekam Medis (Many to Many karena 1 rekam medis bisa banyak obat)
    public function rekamMedis()
    {
        return $this->belongsToMany(RekamMedis::class, 'rekam_medis_obat');
    }
}
