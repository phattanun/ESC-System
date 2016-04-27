<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigInteger('student_id')->unsigned()->primary();
            $table->string('name');
            $table->string('surname');
            $table->string('nickname');
            $table->string('address');
            $table->string('phone_number');
            $table->string('emergency_contact');
            $table->string('email');
            $table->string('facebook_link');
            $table->string('line_id');
            $table->boolean('sex');
            $table->date('birthdate');
            $table->string('religion');
            $table->char('blood_type',2);
            $table->char('clothing_size',5);
            $table->string('allergy');
            $table->string('anomaly'); # AKA. disease
            $table->timestamp('last_time_attemp')->nullable();
            $table->integer('department')->unsigned();
            $table->integer('group')->unsigned();
            $table->integer('generation')->unsigned();
            $table->string('password');
            $table->rememberToken();

            $table->foreign('department')->references('div_id')->on('divisions');
            $table->foreign('group')->references('div_id')->on('divisions');
            $table->foreign('generation')->references('div_id')->on('divisions');

            $table->index(['department']);
            $table->index(['group']);
            $table->index(['generation']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
