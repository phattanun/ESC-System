<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_files', function (Blueprint $table) {
            $table->integer('act_id')->unsigned();
            $table->string('file_name');
            $table->timestamp('create_at');
            $table->bigInteger('uploader_id')->unsigned();
            $table->primary(array('act_id','file_name','create_at'));

            $table->foreign('act_id')->references('act_id')->on('activities');
            $table->foreign('uploader_id')->references('student_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('activity_files');
    }
}
