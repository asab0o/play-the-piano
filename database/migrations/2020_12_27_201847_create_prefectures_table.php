<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrefecturesTable extends Migration
{
    // テーブル名をareaに変更済み
    public function up()
    {
        // Schema::rename('area', 'prefectures');
        
        Schema::create('prefectures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('name');
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
        // Schema::rename('prefectures', 'area');
        Schema::dropIfExists('prefectures');
    }
}
