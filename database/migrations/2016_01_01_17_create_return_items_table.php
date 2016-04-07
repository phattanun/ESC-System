<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_items', function (Blueprint $table) {
            $table->increments('ret_id');
            $table->integer('list_id')->unsigned();
            $table->integer('inv_id')->unsigned();
            $table->double('amount',10,2);
            $table->boolean('type');
            $table->bigInteger('staff_id')->unsigned();
            $table->timestamp('date');

            $table->foreign('list_id')->references('list_id')->on('borrow_lists');
            $table->foreign('inv_id')->references('inv_id')->on('inventories');
            $table->foreign('staff_id')->references('student_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('return_items');
    }
}
