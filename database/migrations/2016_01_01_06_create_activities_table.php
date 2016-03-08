<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('act_id');
            $table->string('name');
            $table->integer('year')->unsigned();
            $table->string('category');
            $table->boolean('tqf_ethics');
            $table->boolean('tqf_knowledge');
            $table->boolean('tqf_cognitive');
            $table->boolean('tqf_interpersonal');
            $table->boolean('tqf_communication');
            $table->tinyinteger('status');
            $table->integer('avail_year')->unsigned();
            $table->integer('div_id')->unsigned();
            $table->bigInteger('creator_id')->unsigned();
            $table->bigInteger('editor_id')->unsigned();
            $table->timestamps();

            $table->foreign('div_id')->references('div_id')->on('divisions');
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
        Schema::drop('activities');
    }
}
