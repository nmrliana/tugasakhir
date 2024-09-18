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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('pesanan_id')->nullable();
            $table->text('pesanan_nama')->nullable();
            $table->text('auth_id')->nullable();
            $table->text('pesanan_meja_nomor')->nullable();
            $table->text('pesanan_tanggal')->nullable();
            $table->text('pesanan_bulan')->nullable();
            $table->text('pesanan_tahun')->nullable();
            $table->text('pesanan_total_harga')->nullable();
            $table->text('pesanan_catatan')->nullable();
            $table->integer('flag_erase')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
