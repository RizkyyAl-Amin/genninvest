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
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('cover')->nullable(); // Field cover nullable
            $table->string('judul'); // Judul berita
            $table->foreignId('user_id') // Menghubungkan berita dengan tabel users
                ->constrained('users')
                ->onDelete('cascade');
            $table->foreignId('kategori_id') // Menghubungkan dengan kategori berita (ganti dari kategori_berita_id)
                ->constrained('kategori_beritas')
                ->onDelete('cascade');
            $table->date('tanggal'); // Tanggal berita
            $table->text('konten')->nullable(); // Konten berita bisa nullable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
