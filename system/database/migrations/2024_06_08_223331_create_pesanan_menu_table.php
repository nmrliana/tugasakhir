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
        Schema::create('pesanan_menu', function (Blueprint $table) {
            $table->id('pesanan_menu_id');
            $table->text('auth_id')->nullable();
            $table->text('menu_id')->nullable();
            $table->text('pesanan_id')->nullable();
            $table->text('menu_kategori_id')->nullable();
            $table->text('menu_harga')->nullable();
            $table->text('menu_qty')->nullable();
            $table->integer('pesanan_status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_menu');
    }
};
