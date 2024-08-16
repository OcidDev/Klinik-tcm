<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan_harian', function (Blueprint $table) {
            $table->id();
            $table->string('tools'); // Misalnya kolom ini untuk menyimpan jenis alat atau deskripsi
            $table->string('status');
            $table->date('tanggal_daftar');
            $table->string('kode_pasien');
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('lamabaru')->nullable();
            $table->string('jenis_kelamin');
            $table->string('alamat_rumah');
            $table->string('no_handphone');
            $table->string('pekerjaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_harians');
    }
};
