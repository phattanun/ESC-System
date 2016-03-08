<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_reservation', function (Blueprint $table) {
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
            $table->string('guest_name');
            $table->string('guest_surname');
            $table->string('guest_phone_number',20);
            $table->integer('guest_student_id')->unsigned()->nullable();
            $table->string('guest_faculty')->nullable();
            $table->string('guest_email');
            $table->string('guest_org');
            $table->integer('request_room_id');
            $table->integer('allow_room_id')->nullable();
            $table->integer('approver_id')->unsigned()->nullable();
            $table->string('reason_if_not_approve')->nullable();
            $table->timestamp('create_at');
            $table->timestamp('approve_at')->nullable();

            // $table->foreign('request_room_id')->references('')->on('');
            // $table->foreign('allow_room_id')->references('')->on('');
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
        Schema::drop('guest_reservation');
    }
}
