<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuloUsuarioPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos', function(Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('usuarios')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('modulo_id')->unsigned()->index();
            $table->foreign('modulo_id')->references('id')->on('modulos')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('c');
            $table->boolean('r');
            $table->boolean('u');
            $table->boolean('d');
            $table->boolean('s');
            $table->boolean('s1');
            $table->boolean('s2');
            $table->boolean('s3');
            $table->boolean('s4');
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
        Schema::drop('permisos');
    }
}
