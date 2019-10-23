<?php

use Illuminate\Database\Seeder;

class AcademicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            StudentTableSeeder::class,
            DisciplineTableSeeder::class,
            StudentDisciplineTableSeeder::class,
            EquivalencyTableSeeder::class,
        ]);
    }
}
