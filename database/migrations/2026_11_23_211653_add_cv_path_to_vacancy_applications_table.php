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
        Schema::table('vacancy_applications', function (Blueprint $table) {
            // Temporarily nullable so existing seeded data does not break
            $table->string('cv_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacancy_applications', function (Blueprint $table) {
            $table->dropColumn('cv_path');
        });
    }
};
