<?php

use Illuminate\Database\Seeder;

use App\Helpers\Constants;
use App\Stage;

class StageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stage::create([
            'id' => Constants::STAGE_CURRICULUM, 
            'stage'  => 'Currículo',
        ]);

        Stage::create([
            'id' => Constants::STAGE_EQUIVALENT, 
            'stage'  => 'Equivalentes',
        ]);

        Stage::create([
            'id' => Constants::STAGE_EXTRA_CURRICULUM,
            'stage'  => 'Extra-Currículo',
        ]);

        Stage::create([
            'id' => Constants::STAGE_ONGOING,
            'stage'  => 'Em Curso',
        ]);

        Stage::create([
            'id' => Constants::STAGE_TO_ATTEND,
            'stage'  => 'A Cursar',
        ]);

        Stage::create([
            'id' => Constants::STAGE_CURRICULUM_EQUIVALENTS,
            'stage'  => 'Currículo Equivalentes',
        ]);
    }
}
