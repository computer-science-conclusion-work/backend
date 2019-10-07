<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function get() {

        $roles = $this::get(['id', 'role AS value']);

        return response()->json([
            'code'    => 200,
            'message' => '',
            'data'    => [ 
                'items' => $roles
            ]
        ], 200);
    }
}
