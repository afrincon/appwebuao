<?php

use Illuminate\Database\Seeder;

/* Elementos necesarios para la ejecucion */
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $user = new User();
        $user->name = 'Administrador';
        $user->email = 'admin@appwebuao.io';
        $user->password = bcrypt('secret');
        $user->telefono = "8893959";
        $user->fecha_nacimiento = '1999-10-15';
        $user->fecha_ingreso = '2009-12-14';
        $user->direccion = 'Avenida Siempre Viva 123';
        $user->estado = 1;
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Andrés Felipe Rincon';
        $user->email = 'arincon@appwebuao.io';
        $user->password = bcrypt('secret');
        $user->telefono = "8893959";
        $user->fecha_nacimiento = '1999-10-15';
        $user->fecha_ingreso = '2009-12-14';
        $user->direccion = 'Avenida Siempre Viva 123';
        $user->estado = 1;
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = 'Carlos Perez';
        $user->email = 'cperez@appwebuao.io';
        $user->password = bcrypt('secret');
        $user->telefono = "8893959";
        $user->fecha_nacimiento = '1999-10-15';
        $user->fecha_ingreso = '2009-12-14';
        $user->direccion = 'Avenida Siempre Viva 123';
        $user->estado = 0;
        $user->save();
        $user->roles()->attach($role_user);
    }
}
