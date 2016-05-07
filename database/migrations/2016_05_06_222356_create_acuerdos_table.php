<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcuerdosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acuerdos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('content');
            $table->integer('mainUser_id')->unsigned();
            $table->foreign('mainUser_id')->references('id')->on('users');
            $table->integer('primaryUser_id')->unsigned();
            $table->foreign('primaryUser_id')->references('id')->on('users');
            $table->dateTime('agreement_date');
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
        Schema::drop('acuerdos');
    }
}
