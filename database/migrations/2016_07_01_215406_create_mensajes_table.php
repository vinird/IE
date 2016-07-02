<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('message');
            $table->tinyInteger('seen')->nullable();
            $table->integer('sendBy')->unsigned();
            $table->foreign('sendBy')->references('id')->on('users');
            $table->integer('takeBy')->unsigned();
            $table->foreign('takeBy')->references('id')->on('users');
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
        Schema::drop('mensajes');
    }
}
