<?php

use Illuminate\Support\Facades\Route;



//toLogin
Route::view('', 'SFR.login.login');
//toDashes
Route::group(['prefix' => 'sfr-campo'], function() {
    Route::post('menu', 'sedagUsuariosBackController@onLogonUserBack')->name('validate');
    
    //User type Captura

    Route::get('verHistorico', 'sedagBackBenefController@onViewAllData')->name('verHistorico');
    Route::get('editUniquePerson', 'sedagBackBenefController@onEditBenef')->name('editUnique'); 

});








/*to API routes
Route::get('personFUR', 'jovBenefModelFURAPIController@retrivePersonFUR');
Route::get('RetriveTest', 'personController@onAllPerson');
Route::post('altaPersonBen', 'personController@onCreatePerson');
*/