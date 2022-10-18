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


Route::get('onLogon', 'personController@onLoginStatus');
Route::get('onLogonTesting/{CURP}', 'personController@onLoginStatusTestJson');
Route::get('onLogonTestingOn', 'personController@onLoginStatusTestJson');
Route::get('RetriveTest', 'personController@onAllPerson');
Route::post('altaPersonBen', 'personController@onCreatePerson');
Route::post('altaPersonImage', 'personController@onCreateImages');
Route::get('testImage', 'personController@onLoginStatusTestJsonImage');
