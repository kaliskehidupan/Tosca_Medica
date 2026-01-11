<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $fillable = ['nama_dokter', 'spesialis', 'no_telp', 'alamat'];

    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class);
    }
}
