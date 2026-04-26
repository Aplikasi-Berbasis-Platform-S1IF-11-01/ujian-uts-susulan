<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->string('tech_stack')->nullable()->after('description');
            $table->string('github_repo')->nullable()->after('link');
            $table->boolean('is_github_sync')->default(false)->after('github_repo');
        });
    }

    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn(['tech_stack', 'github_repo', 'is_github_sync']);
        });
    }
};