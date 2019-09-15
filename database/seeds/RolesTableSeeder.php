<?php

use Illuminate\Database\Seeder;

use App\Helpers\Constants;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'id' => Constants::ROLE_ADMIN, 
            'role'  => 'Administrador',
        ]);

        Role::create([
            'id' => Constants::ROLE_TEACHER, 
            'role'  => 'Professor',
        ]);

        Role::create([
            'id' => Constants::ROLE_STUDENT,
            'role'  => 'Estudante',
        ]);
    }
}
