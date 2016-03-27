<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_settings', function (Blueprint $table) {
            $table->time('start');
            $table->time('end');
            $table->string('announcement');
            $table->primary(array('start','end'));
            $table->mediumText('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('schedule_settings');
    }
}
