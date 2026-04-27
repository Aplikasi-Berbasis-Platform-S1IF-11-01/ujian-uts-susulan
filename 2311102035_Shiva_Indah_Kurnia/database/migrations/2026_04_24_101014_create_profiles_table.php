<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void {
    Schema::create('profiles', function (Blueprint $table) {
        $table->id();
        $table->string('nama')->nullable();
        $table->string('nim')->nullable();
        $table->string('title')->nullable();
        $table->text('deskripsi')->nullable();
        $table->string('foto')->nullable();
        // Tambahkan ini untuk menu CONTACT:
        $table->string('email')->nullable();
        $table->string('instagram')->nullable();
        $table->string('linkedin')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
