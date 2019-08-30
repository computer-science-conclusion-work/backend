<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Student;

class Discipline extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'disciplines';

    public function student()
    {
        return $this->belongsToMany('App\Student', 'disciplines_students', 'student_id', 'discipline_id');
    }

    public function discipline()
    {
        return $this->belongsToMany('App\Discipline', 'disciplines_disciplines', 'discipline_id', 'discipline_id');
    }

    public function getDisciplinesIds()
    {
        return $this->discipline()->pluck('disciplines.id');
    }
}
