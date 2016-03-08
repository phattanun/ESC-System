<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->string('name');
            $table->integer('inv_id')->unsigned(); //Foreign
            $table->text('address');
            $table->string('phone_no');

            $table->primary(array('name','inv_id'));

            $table->foreign('inv_id')->references('inv_id')->on('inventories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('suppliers');
    }
}
