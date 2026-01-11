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
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasiens')->onDelete('cascade');
            $table->foreignId('dokter_id')->constrained('dokters')->onDelete('cascade');

            // PASTIKAN BARIS INI ADA:
            $table->date('tgl_pemeriksaan');

            $table->text('keluhan');
            $table->text('diagnosa');
            $table->text('tindakan');
            $table->timestamps();
        });
    }
};
