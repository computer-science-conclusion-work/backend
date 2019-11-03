<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentDiscipline extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students_disciplines';

    public $timestamps = true;

    public function stage()
    {
        return $this->hasOne('App\Stage');
    }

    // EQUIVALENCIES
    public function equivalency()
    {
        return $this->belongsToMany('App\Equivalency', 'equivalencies', 'id_student_discipline_b', 'id_student_discipline_a');
    }

    public function reverseEquivalency()
    {
        return $this->belongsToMany('App\Equivalency', 'equivalencies', 'id_student_discipline_a', 'id_student_discipline_b');
    }

    public function getEquivalenciesIds()
    {
        return $this->equivalency()->pluck('students_disciplines.id');
    }

    public function getReverseEquivalenciesIds()
    {
        return $this->reverseEquivalency()->pluck('students_disciplines.id');
    }

    static public function getIdbyCodeAndRegistration($code, $registration)
    {
        $student_discipline = StudentDiscipline::join('disciplines', 'students_disciplines.id_discipline', 'disciplines.id')
            ->join('students', 'students_disciplines.id_student', 'students.id')
            ->where([
                ['disciplines.code' , '=', $code],
                ['students.registration' , '=', $registration]
            ])
            ->select('students_disciplines.id',
                'students_disciplines.id_student',
                'students_disciplines.id_discipline'
            )
            ->first();
        return !is_null($student_discipline)? $student_discipline->id: null;
    }
}
