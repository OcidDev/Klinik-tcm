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
        Schema::table('dokters', function (Blueprint $table) {
            $table->string('hari')->nullable()->default('Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu');
            $table->time('start_praktek')->nullable()->default('08:00:00');
            $table->time('end_praktek')->nullable()->default('20:00:00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dokters', function (Blueprint $table) {
            $table->dropColumn('hari');
            $table->dropColumn('start_praktek');
            $table->dropColumn('end_praktek');
        });
    }
};
