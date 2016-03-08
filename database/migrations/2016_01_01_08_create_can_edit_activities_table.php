<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanEditActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('can_edit_activities', function (Blueprint $table) {
            $table->integer('act_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
            $table->primary(array('act_id','student_id'));

            $table->foreign('act_id')->references('act_id')->on('activities');
            $table->foreign('student_id')->references('student_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('can_edit_activities');
    }
}
