<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome');
//to API routes
Route::get('personFUR', 'jovBenefModelFURAPIController@retrivePersonFUR');
Route::get('RetriveTest', 'personController@onAllPerson');
Route::post('altaPersonBen', 'personController@onCreatePerson');
