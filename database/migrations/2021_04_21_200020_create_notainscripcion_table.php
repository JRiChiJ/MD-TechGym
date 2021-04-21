<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotainscripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notainscripcion', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->foreignId('id_tipoinscripcion');
            $table->foreign('id_tipoinscripcion')->references('id')->on('tipoinscripcion');
            $table->foreignId('id_cliente');
            $table->foreign('id_cliente')->references('id')->on('cliente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notainscripcion');
    }
}
