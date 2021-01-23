<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LeagueHasSeason extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('league_has_seasons', function (Blueprint $table) {
            $table->unsignedBigInteger('league_id');
            $table->foreign('league_id')
                ->references('id')
                ->on('leagues')->onDelete('cascade');
            $table->unsignedBigInteger('season_id');
            $table->foreign('season_id')
                ->references('id')
                ->on('seasons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('league_has_seasons');
    }
}
