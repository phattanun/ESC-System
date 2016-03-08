<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_lists', function (Blueprint $table) {
            $table->increments('list_id');
            $table->boolean('status')->nullable();
            $table->integer('creator_id')->unsigned();
            $table->integer('div_id')->unsigned()->nullable();
            $table->string('other_div')->nullable();
            $table->integer('act_id')->unsigned()->nullable();
            $table->string('other_act')->nullable();
            $table->timestamp('create_at');

            $table->foreign('creator_id')->references('student_id')->on('users');
            $table->foreign('div_id')->references('div_id')->on('divisions');
            $table->foreign('act_id')->references('act_id')->on('activities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('borrow_lists');
    }
}
