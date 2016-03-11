<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    public $timestamps = false;
    protected $table = 'contacts';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigInteger('student_id')->unsigned();
            $table->string('position');

            $table->primary(array('student_id','position'));
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
        Schema::drop('contacts');
    }
}
