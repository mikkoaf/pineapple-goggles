<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTextLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('dialogue_person_id');
            $table->foreign('dialogue_person_id')->references('id')->on('dialogue_people')->onDelete('cascade');
            $table->unsignedBigInteger('text_message_id');
            $table->foreign('text_message_id')->references('id')->on('text_messages')->onDelete('cascade');
            $table->unsignedBigInteger('location_history_id');
            $table->foreign('location_history_id')->references('id')->on('location_histories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('text_locations');
    }
}
