<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificacion_producto', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_producto');

            $table->foreign('id_producto')->references('id')->on('productos');
            $table->tinyInteger('calificacion');

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
        Schema::dropIfExists('calificacion_producto');
    }
};
