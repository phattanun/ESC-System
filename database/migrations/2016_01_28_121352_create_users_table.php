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
            $table->string('student_id')->primary();
            $table->string('password');
            $table->string('name');
            $table->string('surname');
            $table->string('nickname');
            $table->string('address');
            $table->timestamp('birthdate');
            $table->string('phone_number');
            $table->string('email');
            $table->string('facebook_link');
            $table->string('line_id');
            $table->string('emergency_contact');
            $table->integer('department_id');
            $table->char('group',1);
            $table->string('allergy');
            $table->string('anomaly'); # AKA. disease
            $table->string('religion');
            $table->char('blood_type',2);
            $table->char('clothing_size',5);
            $table->timestamp('last_time_attemp')->nullable();
            $table->rememberToken();
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
