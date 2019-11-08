<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\Discipline;

class Student extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'registration', 'name', 'id_system_user', 'egress_date'
    ];

    public $timestamps = true;

    public function discipline($stage_id)
    {
        $query = $this->belongsToMany('App\Discipline', 'students_disciplines', 'id_student', 'id_discipline')
            ->withPivot('year_semester', 'note', 'workload', 'credits', 'id_stage');

        if(isset($stage_id) && is_array($stage_id) && !empty($stage_id)){
            $query->whereIn('id_stage', $stage_id);
        } else if(isset($stage_id) && $stage_id != null && $stage_id != ''){
            $query->where('id_stage', '=', $stage_id);
        }

        return $query;
    }

    public function system_user()
    {
        return $this->hasOne('App\SystemUser');
    }

    public function getDisciplinesIds()
    {
        return $this->discipline()->pluck('disciplines.id');
    }

    public static function getStudents($filters) {

        $registration = $name = '';
        
        if(isset($filters->registration) && ($filters->registration != '')){
            $registration = "AND students.registration = {$filters->registration}";
        }

        if(isset($filters->name) && ($filters->name != '')){
            $name = "AND students.name LIKE '%{$filters->name}%'";
        }

        $query = DB::select("
        SELECT students.id,
            students.name
        FROM students
        WHERE students.id IS NOT NULL
        {$registration}
        {$name};
        ");

        return $query;
    }

    public static function getStudentsMedian($filters) {

        $registration_inner = $registration_outer = $name_inner = $name_outer = '';
        
        if(isset($filters->registration) && ($filters->registration != '')){
            $registration_inner = "AND s_e.registration = {$filters->registration}";
            $registration_outer = "AND students.registration = {$filters->registration}";
        }

        if(isset($filters->name) && ($filters->name != '')){
            $name_inner = "AND s_e.name LIKE '%{$filters->name}%'";
            $name_outer = "AND students.name LIKE '%{$filters->name}%'";
        }

        $query = DB::select("
        SELECT done_disciplines.year_semester AS x,
            AVG(done_disciplines.note) AS y
        FROM
        (
            SELECT students.id AS student_id,
            students.registration,
            students.name,
            students_disciplines.id,
            equivalents.id AS equivalent_id,
            AVG(IFNULL(students_disciplines.note, equivalents.note)) AS note,
            IFNULL(students_disciplines.year_semester, equivalents.year_semester) AS year_semester
            FROM students
            INNER JOIN students_disciplines
            ON students.id = students_disciplines.id_student
            LEFT JOIN equivalencies
            ON students_disciplines.id = equivalencies.id_student_discipline_a
            LEFT JOIN (
                SELECT sd_e.id, sd_e.note, sd_e.year_semester
                FROM students AS s_e
                INNER JOIN students_disciplines AS sd_e
                ON s_e.id = sd_e.id_student
                WHERE sd_e.id_stage = 2
                {$registration_inner}
                {$name_inner}
            ) AS equivalents
            ON equivalencies.id_student_discipline_b = equivalents.id
            WHERE students_disciplines.id_stage = 1
            {$registration_outer}
            {$name_outer}
            GROUP BY students.id,
            students.registration,
            students.name,
            students_disciplines.id,
            equivalents.id,
            IFNULL(students_disciplines.year_semester, equivalents.year_semester)
        ) AS done_disciplines
        GROUP BY done_disciplines.year_semester
        HAVING done_disciplines.year_semester IS NOT NULL
        AND AVG(done_disciplines.note) IS NOT NULL;
        ");

        return $query;
    }

    public static function getStudentsWalking($disciplines) {
        $arrDisciplines = [];

        forEach($disciplines as $discipline) {
            $disciplinePre = Discipline::find($discipline->id);
            array_push($arrDisciplines, [
                "discipline"=>$discipline,
                "prerequisites"=>$disciplinePre->prerequisite()->get()
            ]);
        }
        
        return $arrDisciplines;
    }
}