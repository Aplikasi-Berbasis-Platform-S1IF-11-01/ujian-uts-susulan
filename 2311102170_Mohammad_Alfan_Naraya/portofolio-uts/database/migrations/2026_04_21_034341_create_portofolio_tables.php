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
        // 1. Tabel Profiles (Referensi: image_828aab.png)
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nim');
            $table->string('program_studi');
            $table->string('title'); // Contoh: Mahasiswa Informatika & Web Developer
            $table->text('short_bio');
            $table->text('about_me');
            $table->string('email');
            $table->string('instagram')->nullable();
            $table->string('github')->nullable();
            $table->string('foto')->nullable(); // Untuk upload foto profil
            $table->timestamps();
        });

        // 2. Tabel Skills (Referensi: image_828ae7.png)
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('nama_skill');
            $table->integer('persentase')->default(0);
            $table->integer('urutan')->default(0); // Untuk mengatur posisi tampil
            $table->timestamps();
        });

        // 3. Tabel Projects (Referensi: image_828b09.png)
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('judul_project');
            $table->text('deskripsi_project');
            $table->string('link_project')->nullable();
            $table->string('gambar_project')->nullable(); // Untuk upload screenshot project
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
        Schema::dropIfExists('skills');
        Schema::dropIfExists('profiles');
    }
};