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
        Schema::create('sambutan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kepala_desa')->nullable(); // opsional, bisa dihapus jika tidak perlu
            $table->text('sambutan')->nullable();
            $table->string('foto')->nullable(); // Menyimpan nama/path gambar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sambutan');
    }
};
