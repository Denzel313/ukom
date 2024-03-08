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
        Schema::create('pinjam_alats', function (Blueprint $table) {
            $table->id();
            $table->string('peminjam');
            $table->string('tgl_pinjam');
            $table->foreignId('id_barang')->constrained('alats')->cascadeOnDelete();
            $table->string('nama_barang');
            $table->integer('jml_barang');
            $table->string('tgl_kembali');
            $table->string('kondisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjam_alats');
    }
};
