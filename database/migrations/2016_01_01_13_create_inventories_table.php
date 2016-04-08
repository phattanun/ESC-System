<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('inv_id');
            $table->string('name');
            $table->string('type');
            $table->mediumText('image');
            $table->string('unit');
            $table->double('price_per_unit',10,2);
            $table->double('total_qty',10,2);
            $table->double('broken_qty',10,2);
            $table->double('remain_qty',10,2);
            $table->bigInteger('editor_id')->unsigned();
            $table->timestamp('edit_at');

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
        Schema::drop('inventories');
    }
}
