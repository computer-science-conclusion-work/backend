<?php

use Illuminate\Database\Seeder;

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
            'id' => 1,
            'name' => 'adm',
            'email' => 'adm@pucminas.com.br',
            'password' => bcrypt('123456'),
            'id_role' => 1,
            'id_system_user' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
        ]);
    }
}
