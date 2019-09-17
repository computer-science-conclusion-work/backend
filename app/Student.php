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

    public $timestamps = true;

    public function discipline()
    {
        return $this->belongsToMany('App\Discipline', 'students_disciplines', 'id_discipline', 'id_student');
    }

    public function system_user()
    {
        return $this->hasOne('App\SystemUser');
    }

    public function getDisciplinesIds()
    {
        return $this->discipline()->pluck('disciplines.id');
    }
}