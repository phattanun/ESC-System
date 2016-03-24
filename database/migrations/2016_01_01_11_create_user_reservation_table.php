<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_reservation', function (Blueprint $table) {
            $table->increments('res_id');
            $table->text('reason');
            $table->integer('number_of_people')->unsigned();
            $table->timestamp('request_start_time');
            $table->timestamp('request_end_time');
            $table->timestamp('allow_start_time')->nullable();
            $table->timestamp('allow_end_time')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('request_projector');
            $table->boolean('allow_projector')->nullable();
            $table->integer('request_plug')->unsigned();
            $table->integer('allow_plug')->unsigned();
            $table->integer('request_room_id')->unsigned();
            $table->integer('allow_room_id')->unsigned()->nullable();
            $table->bigInteger('approver_id')->unsigned()->nullable();
            $table->string('reason_if_not_approve')->nullable();
            $table->timestamp('create_at');
            $table->timestamp('approve_at')->nullable();

            // USER INFO
            $table->bigInteger('student_id')->unsigned();
            $table->integer('div_id')->unsigned()->nullable();
            $table->string('other_div')->nullable();
            $table->integer('act_id')->unsigned()->nullable();
            $table->string('other_act')->nullable();

            $table->foreign('student_id')->references('student_id')->on('users');
            $table->foreign('div_id')->references('div_id')->on('divisions');
            $table->foreign('act_id')->references('act_id')->on('activities');
            $table->foreign('request_room_id')->references('room_id')->on('meeting_rooms');
            $table->foreign('allow_room_id')->references('room_id')->on('meeting_rooms');
            $table->foreign('approver_id')->references('student_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_reservation');
    }
}
