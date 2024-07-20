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
        Schema::create('stok_awal', function (Blueprint $table) {
            $table->id('stok_awal');
            $table->date('stok_tanggal')->nullable();
            $table->integer('stok_modal_awal')->nullable();
            $table->text('stok_detail')->nullable();
            $table->text('flag_erase')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok_awal');
    }
};
