<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Drop dan buat ulang experiences
        Schema::dropIfExists('experiences');
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('period');
            $table->string('position');
            $table->string('company');
            $table->text('responsibilities')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        // Drop dan buat ulang organizations
        Schema::dropIfExists('organizations');
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('period');
            $table->string('position');
            $table->string('organization_name');
            $table->text('responsibilities')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('experiences');
        Schema::dropIfExists('organizations');
    }
};