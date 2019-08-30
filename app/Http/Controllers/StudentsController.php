<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Discipline;
use App\Helpers\Constants;
use App\Http\Requests\StudentRequest;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filters = json_decode($request->get('filters'));

        $students = Student::select('*')
            ->orderBy('students.id', 'ASC');

        if(isset($filters->id) && ($filters->id != '')){
            $students = $students->where('students.id', $filters->id);
        }
        
        if(isset($filters->description) && ($filters->description != '')){
            $students = $students->where('students.name', 'like', "%{$filters->name}%");
        }

        $students = $students->paginate((int)$request->get('rows'));

        return response()->json([
            'code'    => 200,
            'message' => '',
            'data'    => [ 'items' => $students ]
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Método não utilizado
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        try {
            $student = new Student($request->all());
            $student->save();

            if($request->discipline){
                foreach($request->discipline as $key => $value){
                    $student->discipline()->attach($value['id'],
                        [
                            'year_semester' => $value['year_semester'],
                            'note'          => $value['note'],
                            'workload'      => $value['workload'],
                            'credits'       => $value['credits'],
                        ]
                    ); 
                }
            }

            return response()->json([
                'code'    => 200,
                'message' => 'Registro inserido com sucesso!',
                'data'    => [ 'items' => $student ]
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                'code'    => 403,
                'message' => 'Ops... Houve um erro ao inserir o registro.',
                'data'    => $e->getMessage()
            ], 403);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);

        if (empty($student)) {
            return response()->json([
                'code'    => 403,
                'message' => 'Estudante não encontrado.',
                'data'    => [ ]
            ], 403);
        }

        return response()->json([
            'code'    => 200,
            'message' => '',    
            'data'    => [ 'items' => $student ]
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Método não utilizado
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\StudentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        $student = Student::find($id);
        
        if (empty($student)) {
            return response()->json([
                'code'    => 403,
                'message' => 'Estudante não encontrado.',
                'data'    => [ ]
            ], 403);
        }

        try {
            $student->fill($request->all());
            $student->save();

        } catch(\Exception $e) {
            return response()->json([
                'code'    => 403,
                'message' => 'Ops... Houve um erro ao atualizar o registro.',
                'data'    => $e->getTraceAsString()
            ], 403);
        }
        
        return response()->json([
            'code'    => 200,
            'message' => 'Registro atualizado com sucesso!',
            'data'    => [ 'items' => $student ]
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        
        if (empty($student)) {
            return response()->json([
                'code'    => 403,
                'message' => 'Estudante não encontrado.',
                'data'    => [ ]
            ], 403);
        }
        
        try {
            $student->delete();
        } catch(\Exception $e) {
            return response()->json([
                'code'    => 403,
                'message' => 'Ops... Houve um erro ao remover o registro.',
                'data'    => $e->getMessage()
            ], 403);
        }
        
        return response()->json([
            'code'    => 200,
            'message' => 'Registro deletado com sucesso!',
            'data'  => [ 'items' => $student ]
        ], 200);
    }

    /**
     * Get the relation of Student-Discipline
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDisciplinePerID($id)
    {
        try{
            $student = Student::find($id);
            $disciplines = Discipline::all();

            $disc = $student->getDisciplinesIds()->toArray();

            foreach($disciplines as $key => $value){
                if(in_array($value->id, $discs)){
                    $value['status'] = true;
                }
                else{
                    $value['status'] = false;
                }
            }
        }catch(\Exception $e){
            return response()->json([
                'code'    => 400,
                'message' => 'Ops... Houve um erro ao recuperar o registro.',
                'data'    => $e->getMessage()
            ], 400);
        }

        return response()->json([
            'code'    => 200,
            'message' => 'Lista Carregada Com Sucesso',
            'data'    => [ 'item' => $disciplines ]
        ], 200);
    }

    /**
     * Get the relation of Student-Discipline
     * 
     * @param  App\Http\Requests\StudentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saveDisciplinesPerID(StudentRequest $request, $id)
    {
        $student = Student::find($id);
        $data = $request->all();
        $idsArray = [];

        try{

            foreach($data as $key => $value){
                if($value['status'] == true){
                    array_push($idsArray, $value['id']);
                }
            }
            $student->discipline()->sync($idsArray);

        }catch(\Exception $e){
            return response()->json([
                'code'    => 400,
                'message' => 'Ops... Houve um erro ao atualizar os registros.',
                'data'    => $e->getMessage()
            ], 400);
        }

        return response()->json([
            'code'    => 200,
            'message' => 'Lista Carregada Com Sucesso',
            'data'    => [ ]
        ], 200);
    }
}
