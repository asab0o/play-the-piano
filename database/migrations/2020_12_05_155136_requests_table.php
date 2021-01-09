<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->nsignedBigInteger('users_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title');
            $table->string('name');
            $table->integer('tel_number')->nullable();
            $table->dateTime('date_time');
            $table->string('area');
            $table->string('rewards');
            $table->string('parking_lots');
            $table->string('genres');
            $table->string('dress');
            $table->string('introduction');
            $table->dateTime('display_date_from');
            $table->dateTime('display_time_from');
            $table->dateTime('display_date_to');
            $table->dateTime('display_time_to');
            $table->dateTime('application_date_from');
            $table->dateTime('application_time_from');
            $table->dateTime('application_date_to');
            $table->dateTime('application_time_to');
            $table->string('image_path_1')->nullable();
            $table->string('image_path_2')->nullable();
            $table->string('image_path_3')->nullable();
            $table->string('image_path_4')->nullable();
            $table->string('image_path_5')->nullable();
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
        Schema::dropIfExists('requests');
    }
}
