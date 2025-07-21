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
        Schema::create('peminjaman_bukus', function (Blueprint $table) {
            $table->id();

            $table->foreignId('buku_id')->constrained('bukus')->onDelete('cascade');
            $table->string('nama_peminjam');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali')->nullable(); // optional kalau belum dikembalikan

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_bukus');
    }
};
