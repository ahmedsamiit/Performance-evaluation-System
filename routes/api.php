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
//list users
Route::get('/users', 'UserController@index');
// create one user
Route::post('/user', 'UserController@store');
// list single user
Route::get('/user/{id}', 'UserController@show');
// edit user
Route::put('/user/{id}', 'UserController@update');
//delete user
Route::delete('/user/{id}', 'UserController@destroy');
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

