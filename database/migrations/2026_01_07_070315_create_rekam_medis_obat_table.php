<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    // Nama tabel sudah benar sesuai permintaan error: rekam_medis_obat
    Schema::create('rekam_medis_obat', function (Blueprint $table) {
        $table->id();
        $table->foreignId('rekam_medis_id')->constrained('rekam_medis')->onDelete('cascade');
        // Pastikan nama tabel referensinya adalah 'obats' (sesuai database Anda)
        $table->foreignId('obat_id')->constrained('obats')->onDelete('cascade');
        $table->timestamps();
    });
}

public function down(): void
{
    // Ubah nama di sini juga agar bisa dihapus saat rollback
    Schema::dropIfExists('rekam_medis_obat'); 
}
};
