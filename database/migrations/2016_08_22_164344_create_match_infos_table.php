<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchInfosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('match_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_match');
            $table->string('home');
            $table->string('away');
            $table->string('home_goal');
            $table->string('away_goal');
            $table->string('home_thrown');
            $table->string('away_thrown');
            $table->string('home_corners');
            $table->string('away_corners');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
