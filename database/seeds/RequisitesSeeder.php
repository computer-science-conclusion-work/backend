<?php

use Illuminate\Database\Seeder;

class RequisitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CorequisiteTableSeeder::class,
            PrerequisiteTableSeeder::class,
        ]);
    }
}
