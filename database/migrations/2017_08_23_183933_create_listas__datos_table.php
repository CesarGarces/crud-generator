<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateListasDatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listas__datos', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('marcable');
            $table->string('referenciable');
            $table->date('fecha_crea');
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
        Schema::drop('listas__datos');
    }
}
