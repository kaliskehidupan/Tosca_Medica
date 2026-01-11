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
        // Membuat tabel pivot untuk relasi Many-to-Many
        Schema::create('obat_rekam_medis', function (Blueprint $table) {
            $table->id();
            // Menghubungkan ke tabel rekam_medis
            $table->foreignId('rekam_medis_id')->constrained('rekam_medis')->onDelete('cascade');
            // Menghubungkan ke tabel obats
            $table->foreignId('obat_id')->constrained('obats')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Nama tabel harus sama dengan yang di atas agar bisa dihapus saat rollback
        Schema::dropIfExists('obat_rekam_medis');
    }
};
