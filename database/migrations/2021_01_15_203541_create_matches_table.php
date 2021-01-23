<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->date('match_day');
            $table->timestamps();
        });
        Schema::table('matches', function (Blueprint $table) {
            $table->unsignedBigInteger('home_id');
            $table->unsignedBigInteger('guest_id');
            $table->unsignedBigInteger('stadium_id');
            $table->unsignedBigInteger('season_id');

            $table->foreign('home_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('guest_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('stadium_id')->references('id')->on('stadiums');
            $table->foreign('season_id')->references('id')->on('seasons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
