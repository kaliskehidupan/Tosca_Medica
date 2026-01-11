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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique(); // Tambahkan ini agar validasi 'unique:pasiens,nik' jalan
            $table->string('nama_pasien');
            $table->date('tgl_lahir'); // Ubah dari tanggal_lahir ke tgl_lahir supaya sama dengan Controller
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('alamat');
            $table->string('nomor_telepon')->nullable(); // Tambahkan nullable jika tidak wajib diisi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
