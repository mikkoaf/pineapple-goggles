<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Table which stores private text messages.
 * DO NOT Softdelete!
 */
class CreateTextMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('text_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('dialogue_person_id');
            $table->foreign('dialogue_person_id')->references('id')->on('dialogue_people')->onDelete('cascade');
            $table->string('person_name');
            $table->longText('message');
            $table->dateTime('message_sent');
            $table->date('date');
            $table->string('time');
            $table->enum('connected', ['false', 'true', 'tried']); // propably not needed
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
        Schema::dropIfExists('text_messages');
    }
}
