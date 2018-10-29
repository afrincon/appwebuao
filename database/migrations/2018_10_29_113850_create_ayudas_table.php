<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAyudasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayudas', function (Blueprint $table) {
            $table->increments('id_ayuda');
            $table->integer('id_tipoayuda')->unsigned();
            $table->integer('id_beneficiario')->unsigned();
            $table->integer('id_iglesia')->unsigned();            
            $table->date('fecha_ayuda');
            $table->string('observaciones')->nullable();
            $table->softDeletes(); //Borrado lógico
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
        Schema::dropIfExists('ayudas');
    }
}
