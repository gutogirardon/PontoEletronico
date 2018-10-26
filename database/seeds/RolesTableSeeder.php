<?php

use Illuminate\Database\Seeder;
use App\Models\Roles;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::create([
            'name'     => 'Colaborador',
            'description'     => 'Colaborador do Sistema',
        ]);

        Roles::create([
            'name'     => 'Administrador',
            'description'     => 'Administrador do Sistema',
        ]);


    }
}
