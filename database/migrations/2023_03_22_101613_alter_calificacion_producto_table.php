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
        //

        Schema::table('calificacion_producto', function (Blueprint $table) {
        
            $table->dropForeign(['id_producto']);

            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');;
           
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
