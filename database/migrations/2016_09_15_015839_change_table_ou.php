<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTableOu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ou', function (Blueprint $table) {
            $table->string('home_handicap', 50)->index();
            $table->string('home_ratio', 50)->index();
            $table->string('away_handicap', 50)->index();
            $table->string('away_ratio', 50)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ou', function (Blueprint $table) {
            //
        });
    }
}
