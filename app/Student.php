<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Discipline;

class Student extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students';

    public function discipline()
    {
        return $this->belongsToMany('App\Discipline', 'disciplines_students', 'discipline_id', 'student_id');
    }

    public function getDisciplinesIds()
    {
        return $this->discipline()->pluck('disciplines.id');
    }
}