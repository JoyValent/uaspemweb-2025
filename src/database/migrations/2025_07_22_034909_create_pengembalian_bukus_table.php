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
        Schema::create('pengembalian_bukus', function (Blueprint $table) {
            $table->id();

            $table->foreignId('peminjaman_buku_id')
                ->constrained('peminjaman_bukus')
                ->onDelete('cascade');

            $table->date('tanggal_pengembalian');
            $table->text('keterangan')->nullable(); // Misalnya: terlambat, kondisi buku rusak, dll

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalian_bukus');
    }
};
