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
        Schema::create('toko', function (Blueprint $table) {
            $table->id('toko_id');
            $table->text('foto_utama')->nullable();
            $table->text('judul')->nullable();
            $table->text('tentang')->nullable();
            $table->text('maps')->nullable();
            $table->text('notlp')->nullable();
            $table->text('email')->nullable();
            $table->text('alamat')->nullable();
            $table->timestamps();
        });

        Schema::create('galeri', function (Blueprint $table) {
            $table->id('galeri_id');
            $table->text('judul_galeri')->nullable();
            $table->text('foto')->nullable();
            $table->timestamps();
        });

        Schema::create('slide', function (Blueprint $table) {
            $table->id('slide_id');
            $table->text('judul_slide')->nullable();
            $table->text('foto')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toko');
        Schema::dropIfExists('galeri');
        Schema::dropIfExists('slide');
    }
};
