<?php

use Illuminate\Database\Seeder;

use App\Helpers\Constants;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => Constants::ROLE_ADMIN,
            'name' => 'adm',
            'email' => 'adm@pucminas.com.br',
            'password' => bcrypt('123456'),
            'id_role' => Constants::ROLE_ADMIN,
            'id_system_user' => Constants::ROLE_ADMIN,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
    }
}
