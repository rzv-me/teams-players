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

// Teams Routes
Route::middleware('auth:api')->get('/teams',                             'TeamController@index');
Route::middleware('auth:api')->post('/teams',                            'TeamController@store');
Route::middleware('auth:api')->get('/teams/{id}',                        'TeamController@show');


// Players Routes
Route::middleware('auth:api')->get('/players',                           'PlayerController@index');
Route::middleware('auth:api')->patch('/players/{id}',                    'PlayerController@update');



// Teams Players Routes
Route::middleware('auth:api')->get('/teams/{id}/players',                'TeamPlayersController@index');
Route::middleware('auth:api')->post('/teams/{id}/players',               'TeamPlayersController@store');

