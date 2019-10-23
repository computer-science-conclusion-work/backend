<?php

use Illuminate\Database\Seeder;

use App\Equivalency;
use App\StudentDiscipline;

class EquivalencyTableSeeder extends Seeder
{

    public function __construct() {
        $this->filename = app('path') . '/../database/seeds/src/equivalencies.csv';
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedData = $this->seedFromCSV($this->filename, ',');
        foreach ($seedData as $d) {
            $equivalency = new Equivalency();
            $equivalency->id_student_discipline_a = StudentDiscipline::getIdbyCodeAndRegistration(str_replace('"','',$d[1]), str_replace('"','',$d[0]));
            $equivalency->id_student_discipline_b = StudentDiscipline::getIdbyCodeAndRegistration(str_replace('"','',$d[2]), str_replace('"','',$d[0]));

            if(!is_null($equivalency->id_student_discipline_a) && 
                !is_null($equivalency->id_student_discipline_b)) {
                $equivalency->save();
            }
        }
    }

    private function seedFromCSV($filename, $delimitor = ",") {
        if (!file_exists($filename) || !is_readable($filename)) {
            return FALSE;
        }
        $data = [];
        if (($handle = fopen($filename, 'r')) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, $delimitor, $enclosure = "'")) !== FALSE) {
                $data[] = $row;
            }
            fclose($handle);
        }

        return $data;
    }
}
