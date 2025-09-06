<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToGroupResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up(): void
{
    Schema::table('group_resources', function (Blueprint $table) {
        $table->foreignId('user_id')->after('group_id')->constrained()->onDelete('cascade');
    });
}

public function down(): void
{
    Schema::table('group_resources', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
    });
}

}
