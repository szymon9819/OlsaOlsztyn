<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_post', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tag_id');
            $table->unsignedBigInteger('post_id');
        });
        Schema::table('tag_post', function (Blueprint $table) {
            $table->foreign('tag_id')
                ->references('id')
                ->on('post_tags')->onDelete('cascade');;
        });

        Schema::table('tag_post', function (Blueprint $table) {
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')->onDelete('cascade');;
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_post');
    }
}
