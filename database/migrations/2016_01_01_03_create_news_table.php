<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('news_id');
            $table->string('title');
            $table->text('content');
            $table->mediumText('image');
            $table->boolean('at_home');
            $table->bigInteger('creator_id')->unsigned()->nullable();
            $table->bigInteger('editor_id')->unsigned()->nullable();
            //$table->string('category');
            //$table->integer('view_count'); //<--- may be unnecessary (replaced with google analytic)
            $table->timestamps();
            $table->foreign('creator_id')->references('student_id')->on('users');
            $table->foreign('editor_id')->references('student_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('news');
    }
}
