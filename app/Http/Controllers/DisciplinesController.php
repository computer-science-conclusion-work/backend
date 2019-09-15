<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Discipline;
use App\Helpers\Constants;
use App\Http\Requests\DisciplineRequest;

class DisciplinesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param App\Http\Requests\DisciplineRequest $request
     * @return \Illuminate\Http\Response
     */
    public function index(DisciplineRequest $request)
    {
        $filters = json_decode($request->get('filters'));

        $disciplines = Discipline::select('*')
            ->orderBy('disciplines.id', 'ASC');

        if(isset($filters->id) && ($filters->id != '')){
            $disciplines = $disciplines->where('disciplines.id', $filters->id);
        }
        
        if(isset($filters->description) && ($filters->description != '')){
            $disciplines = $disciplines->where('disciplines.name', 'like', "%{$filters->name}%");
        }

        $disciplines = $disciplines->paginate((int)$request->get('rows'));

        return response()->json([
            'code'    => 200,
            'message' => '',
            'data'    => [ 'items' => $disciplines ]
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
     * @param  App\Http\Requests\DisciplineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisciplineRequest $request)
    {
        try {
            $discipline = new Discipline($request->all());
            $discipline->save();

            if($request->discipline){
                foreach($request->discipline as $key => $value){
                    $store->dicipline()->attach($value['id']); 
                }
            }

            return response()->json([
                'code'    => 200,
                'message' => 'Registro inserido com sucesso!',
                'data'    => [ 'items' => $discipline ]
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
        $discipline = Discipline::find($id);

        if (empty($discipline)) {
            return response()->json([
                'code'    => 403,
                'message' => 'Disciplina não encontrada.',
                'data'    => [ ]
            ], 403);
        }

        return response()->json([
            'code'    => 200,
            'message' => '',    
            'data'    => [ 'items' => $discipline ]
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
     * @param  App\Http\Requests\DisciplineRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $discipline = Discipline::find($id);
        
        if (empty($discipline)) {
            return response()->json([
                'code'    => 403,
                'message' => 'Disciplina não encontrada.',
                'data'    => [ ]
            ], 403);
        }

        try {
            $discipline->fill($request->all());
            $discipline->save();

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
            'data'    => [ 'items' => $discipline ]
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
        $discipline = Discipline::find($id);
        
        if (empty($discipline)) {
            return response()->json([
                'code'    => 403,
                'message' => 'Disciplina não encontrada.',
                'data'    => [ ]
            ], 403);
        }
        
        try {
            $discipline->delete();
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
            'data'  => [ 'items' => $discipline ]
        ], 200);
    }
}
