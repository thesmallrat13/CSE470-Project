<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFilePathToGroupResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('group_resources', function (Blueprint $table) {
        $table->string('file_path')->nullable()->after('title');
    });
}

public function down()
{
    Schema::table('group_resources', function (Blueprint $table) {
        $table->dropColumn('file_path');
    });
}

}
