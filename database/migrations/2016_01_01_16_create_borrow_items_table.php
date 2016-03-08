<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_items', function (Blueprint $table) {
            $table->integer('list_id')->unsigned();
            $table->integer('inv_id')->unsigned();
            $table->double('amount',10,2);
            $table->timestamp('borrow_date');
            $table->timestamp('return_date');
            $table->tinyinteger('status');
            $table->integer('approver_id')->unsigned();
            $table->integer('giver_id')->unsigned();
            $table->string('reason_if_not_approve')->nullable();

            $table->primary(array('list_id','inv_id'));

            $table->foreign('list_id')->references('list_id')->on('borrow_lists');
            $table->foreign('inv_id')->references('inv_id')->on('inventories');
            $table->foreign('approver_id')->references('student_id')->on('users');
            $table->foreign('giver_id')->references('student_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('borrow_items');
    }
}