<?php

use Illuminate\Database\Seeder;

class TiposAyudaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_ayudas')->insert([
            'descripcion' => 'Mercado',
        ]);

        DB::table('tipo_ayudas')->insert([
            'descripcion' => 'Almuerzo',
        ]);

        DB::table('tipo_ayudas')->insert([
            'descripcion' => 'Asistencia',
        ]);
    }
}
