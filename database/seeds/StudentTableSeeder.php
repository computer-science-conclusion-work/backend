<?php

use Illuminate\Database\Seeder;

use App\Student;

class StudentTableSeeder extends Seeder
{

    public function __construct() {
        $this->filename = app('path') . '/../database/seeds/src/students.csv';
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
            $student = new Student();
            $student->registration = str_replace('"','',$d[0]);
            $student->name = str_replace('"','',$d[1]);
            $student->egress_date = null;
            $student->id_system_user = null;
            $student->save();
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
