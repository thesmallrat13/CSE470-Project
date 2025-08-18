<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_mentor')->default(false);
            $table->text('bio')->nullable();
            $table->integer('experience_years')->nullable();
            $table->string('google_scholar')->nullable();
            $table->text('publications')->nullable();
            $table->boolean('available_for_collab')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'is_mentor',
                'bio',
                'experience_years',
                'google_scholar',
                'publications',
                'available_for_collab'
            ]);
        });
    }
};
