<?php

use Illuminate\Support\Facades\Route;



//toLogin
Route::view('', 'SFR.login.login');
//toDashes
Route::group(['prefix' => 'sfr-campo'], function() {
    Route::post('menu', 'sedagUsuariosBackController@onLogonUserBack')->name('validate');
    
    //User type Captura
    Route::get('verHistorico', 'sedagBackBenefController@onViewAllData')->name('verHistorico');
    Route::get('nuevoUnico', 'sedagBackBenefController@onNewBenef')->name('nuevo');
    Route::post('registroUnico', 'sedagBackBenefController@publicBenef')->name('registro');
    
    Route::get('editUniquePerson/{idBenef}', 'sedagBackBenefController@onEditBenef')->name('editUnique'); 
    Route::put('updateBenef/{idBenef}/editado', 'sedagBackBenefController@onUpdateBenef')->name('updateUnique');


    //getLocalidades
   
    //User type admin

    
});








/*to API routes
Route::get('personFUR', 'jovBenefModelFURAPIController@retrivePersonFUR');
Route::get('RetriveTest', 'personController@onAllPerson');
Route::post('altaPersonBen', 'personController@onCreatePerson');
*/