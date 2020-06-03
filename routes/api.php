<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware([ 'auth:sanctum','JsonResponse'])->group(function () {

    //list users
    Route::get('/users', 'UserController@index');
    // create one user
    Route::post('/user', 'UserController@store');
    // list single user
    Route::get('/user/{user}', 'UserController@show');
    // edit user
    Route::put('/user/{user}', 'UserController@update');
    //delete user
    Route::delete('/user/{user}', 'UserController@destroy');
    //list roles
    Route::get('/roles', 'RoleController@index');
    // create one role
    Route::post('/role', 'RoleController@store');
    // list single role
    Route::get('/role/{id}', 'RoleController@show');
    // edit role
    Route::put('/role/{id}', 'RoleController@update');
    //delete role
    Route::delete('/role/{id}', 'RoleController@destroy');

});
//Route::middleware('auth:sanctum')->get('/users','UserController@index');
Route::post('/sanctum/token', 'GenerateTaken');


Route::post('/evaluation_cycle', 'Evaluation_CycleController@store');
// user_indicators middleware
Route::post('/evaluations', 'User_IndicatorController@create');
//list indicators for specific user
Route::get('/evaluation/{id}', 'User_IndicatorController@getUserIndicators');


Route::get('/criterias', 'CriteriaController@index');

Route::post('/criteria', 'CriteriaController@store');

Route::get('/criteria/{id}', 'CriteriaController@show');

Route::put('/criteria/{id}', 'CriteriaController@update');

Route::delete('/criteria/{id}', 'CriteriaController@destroy');

Route::get('/indicators', 'IndicatorController@index');

Route::post('/indicator', 'IndicatorController@store');

Route::get('/indicator/{id}', 'IndicatorController@show');

Route::put('/indicator/{id}', 'IndicatorController@update');

Route::delete('/indicator/{id}', 'IndicatorController@destroy');


Route::get('/evaluation_cycles', 'Evaluation_CycleController@index');



Route::get('/evaluation_cycle/{id}', 'Evaluation_CycleController@show');

Route::put('/evaluation_cycle/{id}', 'Evaluation_CycleController@update');

Route::delete('/evaluation_cycle/{id}', 'Evaluation_CycleController@destroy');




Route::get('/criteriatypes','Criteria_TypeContoller@index');

//evaluations routes
Route::post('/evaluation', 'EvaluationController@store');
Route::get('/evaluations/{userId}/{cycleId}', 'EvaluationController@getEvaluation');