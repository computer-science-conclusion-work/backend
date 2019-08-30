<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
});

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');

        // Rotas de users
        Route::get('users/init', 'UserController@init');
        Route::resource('users', 'UserController');

        // Rotas de students
        Route::resource('students', 'StudentsController');
        Route::get('students/{id}/disciplines', 'StudentsController@getDisciplinePerID');
        Route::post('students/{id}/disciplines/save', 'StudentsController@saveDisciplinePerID');

        // Rotas de disciplines
        Route::resource('discipline', 'DisciplineController');
        Route::get('discipline/{id}/disciplines', 'DisciplineController@getDisciplinePerID');
        Route::post('discipline/{id}/disciplines/save', 'DisciplineController@saveDisciplinePerID');
    });