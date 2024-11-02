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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('news_id')->constrained()->onDelete('cascade'); // Relasi ke berita
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); // Relasi ke user (optional)
            $table->string('name')->default('Anonim'); // Nama pengirim komentar
            $table->text('body'); // Isi komentar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};