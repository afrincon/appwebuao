<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_documentos')->insert([
            'descripcion' => 'Cedúla',
        ]);

        DB::table('tipo_documentos')->insert([
            'descripcion' => 'Tarjeta de identidad',
        ]);
        DB::table('tipo_documentos')->insert([
            'descripcion' => 'Pasaporte',
        ]);

        DB::table('tipo_documentos')->insert([
            'descripcion' => 'Cedúla de extrajeria',
        ]);



        

    }
}
