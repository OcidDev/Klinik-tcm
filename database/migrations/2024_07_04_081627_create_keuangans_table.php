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
        // Kalau itu tgl pembayaran, nama, alamat, nomer hp, warna brosur, uang masuk, sama jumlah saldo
        Schema::create('keuangans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_antrian');
            $table->integer('id_pasien');
            $table->date('tgl_pembayaran');
            $table->string('uang_masuk');
            $table->integer('status')->default(1);
            $table->integer('action_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keuangans');
    }
};
