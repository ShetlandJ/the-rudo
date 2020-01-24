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

Route::get('wrestlers', 'WrestlerController@index');
Route::get('wrestlers/{id}', 'WrestlerController@view');
Route::post('wrestlers/{wrestler_id}/state/{state_id}', 'WrestlerToStatesController@create');
