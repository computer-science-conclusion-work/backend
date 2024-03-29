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

Route::middleware(['auth:api', 'cors'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth',
    'middleware' => 'cors'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
});

Route::group([ 
    'middleware' => [
        'auth:api',
        'cors'
    ],
 ], function() {
    Route::get('logout', 'AuthController@logout');
    Route::get('user', 'AuthController@user');

    // Rotas de users
    Route::get('users/init/{id}', 'UserController@init');
    Route::resource('users', 'UserController');

    // Rotas de students
    Route::resource('students', 'StudentsController');
    Route::get('students/{id}/stage/{stage_id}', 'StudentsController@getStudentsDisciplines');
    Route::get('students_median', 'StudentsController@getStudentsMedian');
    Route::get('students_walking', 'StudentsController@getStudentsWalking');

    // Rotas de disciplines
    Route::resource('disciplines', 'DisciplinesController');
    Route::get('disciplines/{id}/prerequisites', 'DisciplinesController@getPrerequisites');
    Route::get('disciplines/{id}/corequisites', 'DisciplinesController@getCorequisites');

    // Outras Rotas
    Route::get('roles', 'RolesController@roles');
});