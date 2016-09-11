<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ou', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('match_id')->index();
            $table->enum('team', ['home', 'away'])->index();
            $table->string('handicap')->index();
            $table->string('ratio')->index();
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
