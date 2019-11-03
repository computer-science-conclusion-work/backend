<?php

use Illuminate\Database\Seeder;

use App\Student;

class UpdateStudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = Student::get();
        
        foreach($students as $key => $student) {
            $disciplines = $student->discipline(null)->get();
            foreach($disciplines as $key => $discipline) {
                if(!is_null($discipline->pivot->year_semester)) {
                    if(is_null($student->egress_date)) {
                        $student->egress_date = $discipline->pivot->year_semester;
                    } else {
                        list ($actual_year, $actual_semester) = explode('/', $student->egress_date);
                        list ($incoming_year, $incoming_semester) = explode('/', $discipline->pivot->year_semester);
                        if((int)$actual_year > (int)$incoming_year) {
                            $student->egress_date = $discipline->pivot->year_semester;
                        } else if((int)$actual_year == (int)$incoming_year) {
                            if((int)$actual_semester > (int)$incoming_semester) {
                                $student->egress_date = $discipline->pivot->year_semester;
                            }
                        }
                    }
                }
            }
            $student->save();
        }
    }
}
