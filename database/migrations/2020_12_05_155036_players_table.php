<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlayersTable extends Migration
{
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('firstname_1');
            $table->string('lastname_1');
            $table->string('firstname_2');
            $table->string('lastname_2');
            $table->string('birthday')->nullable();
            // $table->integer('birth_month')->nullable();
            // $table->integer('birth_day')->nullable();
            $table->string('gender');
            $table->integer('experience');
            $table->string('prefecture')->nullable();
            $table->string('introduction');
            $table->string('image_path_1')->nullable();
            $table->string('image_path_2')->nullable();
            $table->string('image_path_3')->nullable();
            $table->string('performance')->nullable();
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
        Schema::dropIfExists('players');
    }
}
