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
        Schema::create('menu', function (Blueprint $table) {
         $table->id('menu_id');
         $table->text('menu_nama')->nullable();
         $table->text('menu_foto')->nullable();
         $table->text('menu_harga')->nullable();
         $table->text('menu_kategori_id')->nullable();
         $table->text('menu_satuan')->nullable();
         $table->integer('menu_status')->default(1);
         $table->integer('flag_erase')->default(1);
         $table->timestamps();
     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
