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
            $table->increments('file_id');
            $table->integer('act_id')->unsigned();
            $table->string('file_name');
            $table->string('type');
            $table->bigInteger('size')->unsigned();
            $table->timestamp('create_at');
            $table->bigInteger('uploader_id')->unsigned();

            $table->foreign('act_id')->references('act_id')->on('activities');
            $table->foreign('uploader_id')->references('student_id')->on('users');
        });
        DB::statement("ALTER TABLE activity_files ADD content LONGBLOB");
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
