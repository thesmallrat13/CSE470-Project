<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('research_interests', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->unsignedBigInteger('parent_id')->nullable(); // null = top-level category
        $table->timestamps();

        $table->foreign('parent_id')->references('id')->on('research_interests')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('research_interests');
    }
}
