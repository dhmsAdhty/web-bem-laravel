<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nim', 20);
            $table->string('prodi', 100);
            $table->string('jabatan', 100);
            $table->string('departemen', 100);
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('members');
    }
};