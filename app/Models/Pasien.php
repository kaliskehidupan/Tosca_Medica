<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'nama_pasien',
        'jenis_kelamin',
        'tgl_lahir',
        'alamat'
    ];

    // Tambahkan baris ini untuk menghubungkan Pasien ke Rekam Medis
    public function rekamMedis()
    {
        // Satu pasien bisa punya banyak catatan rekam medis (hasMany)
        return $this->hasMany(RekamMedis::class);
    }
}
