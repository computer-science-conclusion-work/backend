<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\UserRequest;
use App\SystemUser;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function init($id) {
        
        $user = User::find($id);
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
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filters = json_decode($request->get('filters'));

        $users = User::join('roles', 'users.id_role', '=', 'roles.id')
        ->leftJoin('system_users', 'users.id_system_user', '=', 'system_users.id')
        ->select(
            'users.id',
            'users.name',
            'users.email',
            'roles.role AS role',
            'system_users.id AS id_system_user'
        )->orderBy('users.name', 'ASC');

        if(isset($filters->id) && ($filters->id != '')){
            $users = $users->where('users.id', '=', $filters->id);
        }
        if(isset($filters->name) && ($filters->name != '')){
            $users = $users->where('users.name', 'like', '%'.$filters->name.'%');
        }
        $users = $users->paginate((int)$request->get('rows'));

        $roles = Role::get(['id', 'role AS value']);

        return response()->json([
            'code'    => 200,
            'message' => '',
            'data'    => [ 
                'items' => $users,
                'roles' => $roles,
                'filters' => $filters
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
                'message' => 'Ops... Houve um erro ao atualizar o usuário.',
                'data'    => $e->getTraceAsString()
            ], 403);
        }
        
        return response()->json([
            'code'    => 200,
            'message' => 'Usuário atualizado com sucesso!',
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
            $system_user = new SystemUser();
            $system_user->save();

            $user = new User($request->all());
            $user->password = Hash::make($request->password);
            $user->id_system_user = $system_user->id;
            $user->save();

        } catch(\Exception $e) {
            return response()->json([
                'code'    => 403,
                'message' => 'Ops... Houve um erro ao inserir o usuário.',
                'data'    => $e->getMessage()
            ], 403);
        }
        
        return response()->json([
            'code'    => 200,
            'message' => 'Usuário inserido com sucesso!',
            'data'    => [ 'item' => $user ]
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
        $user = User::find($id);

        if (empty($user)) {
            return response()->json([
                'code'    => 403,
                'message' => 'Usuário não encontrado.',
                'data'    => [ ]
            ], 403);
        }

        $system_user = SystemUser::find($user->id_system_user);
        
        try {
            $user->delete();
            $system_user->delete();
        } catch(\Exception $e) {
            return response()->json([
                'code'    => 403,
                'message' => 'Ops... Houve um erro ao remover o usuário.',
                'data'    => $e->getMessage()
            ], 403);
        }
        
        return response()->json([
            'code'    => 200,
            'message' => 'Usuário deletado com sucesso!',
            'data'  => [ 'items' => $user ]
        ], 200);
    }
}
