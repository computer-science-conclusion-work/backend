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

    public function stage()
    {
        return $this->hasOne('App\Stage');
    }

    // EQUIVALENCIES
    public function equivalency()
    {
        return $this->belongsToMany('App\Equivalency', 'equivalencies', 'id_student_discipline_a', 'id_student_discipline_b');
    }

    public function reverseEquivalency()
    {
        return $this->belongsToMany('App\Equivalency', 'equivalencies', 'id_student_discipline_b', 'id_student_discipline_a');
    }

    public function getEquivalenciesIds()
    {
        return $this->equivalency()->pluck('students_disciplines.id');
    }

    public function getReverseEquivalenciesIds()
    {
        return $this->reverseEquivalency()->pluck('students_disciplines.id');
    }
}
