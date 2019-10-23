<?php

use Illuminate\Database\Seeder;

use App\StudentDiscipline;

class StudentDisciplineTableSeeder extends Seeder
{

    public function __construct() {
        $this->filename = app('path') . '/../database/seeds/src/students_disciplines.csv';
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
            $student_discipline = new StudentDiscipline();
            $student_discipline->id_student = str_replace('"','',$d[0]);
            $student_discipline->id_discipline = str_replace('"','',$d[1]);
            $student_discipline->year_semester = str_replace('"','',$d[2]) != ''? str_replace('"','',$d[2]) : null;
            $student_discipline->note = str_replace('"','',$d[3]) != ''? str_replace('"','',$d[3]) : null;
            $student_discipline->workload = str_replace('"','',$d[4]) != ''? str_replace('"','',$d[4]) : null;
            $student_discipline->credits = str_replace('"','',$d[5]) != ''? str_replace('"','',$d[5]) : null;
            $student_discipline->id_stage = str_replace('"','',$d[6]);
            $student_discipline->save();
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
