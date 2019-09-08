<?php

use Illuminate\Database\Seeder;

use App\SystemUser;

class SystemUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SystemUser::create([
            'id' => 1
        ]);
    }
}
