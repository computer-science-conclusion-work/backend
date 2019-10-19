<?php

use Illuminate\Database\Seeder;

use App\Discipline;

class DisciplineTableSeeder extends Seeder
{

    public function __construct() {
        $this->filename = app('path') . '/../database/seeds/src/disciplines.csv';
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
            $discipline = new Discipline();
            $discipline->code = str_replace('"','',$d[0]);
            $discipline->name = str_replace('"','',$d[1]);
            $discipline->alias = str_replace('"','',$d[2]);
            $discipline->period = 0;
            $discipline->save();
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
