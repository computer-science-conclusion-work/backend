<?php

use Illuminate\Database\Seeder;

use App\Helpers\Constants;
use App\Curriculum;

class CurriculumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Curriculum::create([
            'id' => Constants::CURRICULUM_3811, 
            'code'  => '3811',
        ]);

        Curriculum::create([
            'id' => Constants::CURRICULUM_3812, 
            'code'  => '3812',
        ]);
    }
}
