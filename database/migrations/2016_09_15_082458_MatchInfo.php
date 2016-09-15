<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MatchInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	 Schema::create('match_info', function (Blueprint $table) {
	    $table->increments('id');
            $table->integer('match_api_id')->index();
	    $table->integer('home_score');
            $table->integer('away_score');
	    $table->timestamps('start_time');
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
        //
    }
}
