<?php

use Illuminate\Database\Seeder;
use App\Arquidiocesis;

class ArquidiocesisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arquidiocesis = New Arquidiocesis();
        $arquidiocesis->nombre = 'Arquidiócesis de Cali';
        $arquidiocesis->direccion = 'Carrera 4 N. 07-17';
        $arquidiocesis->telefono = '(2)-8890562';
        $arquidiocesis->email = 'comunicaciones@arquicali.org';
        $arquidiocesis->website = 'www.arquicali.org';
        $arquidiocesis->save();
    }
}
