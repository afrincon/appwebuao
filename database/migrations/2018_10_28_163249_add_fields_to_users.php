<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('direccion');
            $table->string('telefono');
            $table->date('fecha_nacimiento');
            $table->date('fecha_ingreso');
            $table->boolean('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('direccion');
            $table->dropColumn('telefono');
            $table->dropColumn('fecha_nacimiento');
            $table->dropColumn('fecha_ingreso');
            $table->dropColumn('estado');
        });
    }
}
