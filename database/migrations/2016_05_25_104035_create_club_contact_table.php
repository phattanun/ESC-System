<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_contacts', function (Blueprint $table) {
            $table->increments('contact_id');
            $table->bigInteger('student_id')->unsigned();
            $table->string('position');

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
        Schema::drop('club_contacts');
    }
}
