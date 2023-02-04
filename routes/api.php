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



//WebService to RestApi logic
Route::get('WebSValidation/{CURP}', 'sedagWSController@WB');

//Schema MLG -> login process
Route::get('login/handle' , 'sedagUsuariosController@getUserPassing');
Route::post('login/post', 'sedagUsuariosController@onFirstReg');
Route::get('personFUR', 'jovBenefModelFURAPIController@retrivePersonFUR');
//Route::get('catData', 'jovBenefModelFURAPIController@retriveProgramas');
/*
Route::get('getDetailProg/{CVE}', 'jovBenefModelFURAPIController@retriveDepenOProg');
Route::get('getDetailEsp/{CVE}', 'jovBenefModelFURAPIController@retriveProgDetalle');
*/
Route::get('getAllDpes', 'sedagCaController@retriveData');
Route::get('getDetailProg/{NOMBRE}', 'sedagCaController@retriveDepenOProg');
Route::get('getDetailEsp/{NOMBRE}', 'sedagCaController@retriveProgDetalle');
Route::get('getStudios', 'sedagCaController@getStudios');
Route::get('getCviles', 'sedagCaController@getCviles');
//Tabla FURWEB_METADATO_SR2022
//Beneficiario register
//Route::post('newBenefPerson', 'jovBenefModelFURAPIController@postOnPersonFUR');

Route::get('benef/handle/{CURP}', 'sedagBenefController@statusCurp');
Route::post('benef/onPostB', 'sedagBenefController@newPersonBenef');


/*
//Images register
Route::post('newPersonImages', 'jovBenefImagesController@postImagesPerson');

//Pass/PIN register
Route::post('pinRegister', 'jovBenefPINController@postPinPass');
Route::get('login/{PIN}', 'jovBenefPINController@getOnPersonWithPINT');
Route::get('initialAPP/{CURP}', 'jovBenefModelFURAPIController@getOnPersonFURCURP');
*/

//Schema TORRES
/*
Route::get('onLogon', 'personController@onLoginStatus');
Route::get('onLogonTesting/{CURP}', 'personController@onLoginStatusTestJson');
Route::get('onLogonTestingOn', 'personController@onLoginStatusTestJson');
Route::get('RetriveTest', 'personController@onAllPerson');
Route::get('testImage', 'personController@onLoginStatusTestJsonImage');
Route::get('onLogonTestWithCURPRPIN/{PIN}', 'personController@onLoginStatusTestJsonForAuth');
Route::get('onLogonTestWithPIN/{CURP}', 'personController@onLoginStatusTestJsonForAuthPIN');
Route::post('altaPersonBen', 'personController@onCreatePerson');
Route::post('altaPersonImage', 'personController@onCreateImages');
Route::post('altaPersonSession', 'personController@onCreatePIN');
Route::post('altaRegPerson', 'personController@onCreateBitPerson');
*/