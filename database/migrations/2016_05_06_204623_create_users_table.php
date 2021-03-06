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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->tinyInteger('userType')->nullable();
            $table->tinyInteger('active')->nullable();
            $table->tinyInteger('isNew')->nullable();
            $table->string('phone')->nullable();
            $table->string('img')->nullable();
            $table->integer('notification')->nullable();
            $table->integer('message')->nullable();
            $table->integer('sede_id')->unsigned()->nullable();
            $table->foreign('sede_id')->references('id')->on('sedes');
            $table->rememberToken();
            $table->timestamps();
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
