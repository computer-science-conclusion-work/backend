<?php

use Illuminate\Database\Seeder;

class UpdatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UpdateDisciplinesTableSeeder::class,
            UpdateStudentsTableSeeder::class,
        ]);
    }
}
