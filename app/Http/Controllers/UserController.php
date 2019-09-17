<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\UserRequest;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function init() {
        
        $roles = Role::get(['id', 'role AS value']);
        
        return response()->json([
            'code'    => 201,
            'message' => '',
            'data'    => [
                'roles'    => $roles,
            ]
        ], 201);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = json_decode($request->get('filters'));

        $users =  new User();
        $users = User::join('roles', 'users.id_role', '=', 'roles.id')
        ->join('system_users', 'users.id_system_user', '=', 'system_users.id')
        ->select(
            'users.id',
            'users.name',
            'users.email',
            'roles.role AS role',
            'system_users.id AS id_system_user'
        )->orderBy('users.name', 'ASC');

        if(isset($filters->name)){
            $users = $users->where('users.name', 'LIKE', '%'.$filters->name.'%');
        }
        if(isset($filters->role_id)){
            $users = $users->where('users.id_role', '=', $filters->role_id);
        }
        $users = $users->get();

        $filterRoles = Role::get(['id', 'role AS value']);

        return response()->json([
            'code'    => 200,
            'message' => '',
            'data'    => [ 
                'items' => $users,
                'filterRoles' => $filterRoles
                ]
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::find($id);
        
        if (empty($user)) {
            return response()->json([
                'code'    => 403,
                'message' => 'Usuário não encontrado.',
                'data'    => [ ]
            ], 403);
        }

        $roles = Role::get(['id', 'role AS value']);
        
        return response()->json([
            'code'    => 201,
            'message' => '',
            'data'    => [ 
                'item'     => $user,
                'roles'    => $roles
            ]
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id) {
        $user = User::find($id);
        
        if (empty($user)) {
            return response()->json([
                'code'    => 403,
                'message' => 'Usuário não encontrado.',
                'data'    => [ ]
            ], 403);
        }

        try {
            $user->fill($request->all());
            if (!empty($request->get('password'))) {
                $user->password = Hash::make($request->get('password'));
            }
            $user->save();

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
            'data'    => [ 'item' => $user ]
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request) {
        try {

            $user = new User($request->all());
            $user->password = Hash::make($request->password);
            $user->save();

        } catch(\Exception $e) {
            return response()->json([
                'code'    => 403,
                'message' => 'Ops... Houve um erro ao inserir o registro.',
                'data'    => $e->getMessage()
            ], 403);
        }
        
        return response()->json([
            'code'    => 200,
            'message' => 'Registro inserido com sucesso!',
            'data'    => [ 'item' => $user ]
        ], 200);
    }
}
