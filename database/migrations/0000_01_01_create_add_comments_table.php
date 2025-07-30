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
            // Komentar ini milik post mana
            $table->foreignId('blog_id')->constrained()->cascadeOnDelete();
            // Komentar ini ditulis oleh user mana
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // Ini adalah kunci untuk sistem balasan. Jika null, ini komentar utama.
            // Jika berisi id, ini adalah balasan untuk komentar lain.
            $table->foreignId('parent_id')->nullable()->constrained('comments')->cascadeOnDelete();
            // Isi dari komentar
            $table->text('body');
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