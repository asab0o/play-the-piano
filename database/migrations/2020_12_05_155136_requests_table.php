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
            $table->integer('users_id');
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
            $table->dateTime('display_from');
            $table->dateTime('display_to');
            $table->dateTime('application_from');
            $table->dateTime('application_to');
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
