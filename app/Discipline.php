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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'alias', 'period'
    ];

    public $timestamps = true;

    public function student($stage_id)
    {
        $query = $this->belongsToMany('App\Student', 'students_disciplines', 'id_discipline', 'id_student')
            ->withPivot('year_semester', 'note', 'workload', 'credits', 'id_stage');
        
        if(isset($stage_id) && $stage_id != null && $stage_id != ''){
            $query->where('id_stage', '=', $stage_id);
        }

        return $query;
    }

    // PREREQUISITES
    public function prerequisite()
    {
        return $this->belongsToMany('App\Discipline', 'prerequisites', 'id_discipline_b', 'id_discipline_a');
    }

    public function reversePrerequisite()
    {
        return $this->belongsToMany('App\Discipline', 'prerequisites', 'id_discipline_a', 'id_discipline_b');
    }

    public function getPrerequisitesIds()
    {
        return $this->prerequisite()->pluck('disciplines.id');
    }

    public function getReversePrerequisitesIds()
    {
        return $this->reversePrerequisite()->pluck('disciplines.id');
    }

    // COREQUISITES
    public function corequisite()
    {
        return $this->belongsToMany('App\Discipline', 'corequisites', 'id_discipline_b', 'id_discipline_a');
    }

    public function reverseCorequisite()
    {
        return $this->belongsToMany('App\Discipline', 'corequisites', 'id_discipline_a', 'id_discipline_b');
    }

    public function getCorequisitesIds()
    {
        return $this->corequisite()->pluck('disciplines.id');
    }

    public function getReverseCorequisitesIds()
    {
        return $this->reverseCorequisite()->pluck('disciplines.id');
    }
}
