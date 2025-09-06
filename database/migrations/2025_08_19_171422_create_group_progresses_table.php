<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('group_progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id')->constrained()->onDelete('cascade');
            $table->string('stage');
            $table->boolean('completed')->default(false);
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('group_progress');
    }
};

