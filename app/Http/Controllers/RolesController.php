<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function roles(Request $request) {

        $roles = Role::get(['id', 'role AS value']);

        return response()->json([
            'code'    => 200,
            'message' => '',
            'data'    => [ 
                'items' => $roles
            ]
        ], 200);
    }
}
