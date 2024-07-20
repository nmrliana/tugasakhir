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
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id('karyawan_id');
            $table->text('karyawan_nama')->nullable();
            $table->text('karyawan_jobdesk')->nullable();
            $table->integer('karyawan_posisi')->nullable();
            $table->text('karyawan_alamat')->nullable();
            $table->text('karyawan_sift')->nullable();
            $table->text('email')->nullable();
            $table->text('karyawan_notlp')->nullable();
            $table->text('karyawan_tgl_masuk')->nullable();
            $table->text('password')->nullable();
            $table->text('karyawan_foto')->nullable();
            $table->integer('flag_erase')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
