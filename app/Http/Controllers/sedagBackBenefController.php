<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\sedagBenefModel;

class sedagBackBenefController extends Controller
{
    


    public function onViewAllData(){

        $logon = session()->get('correoUser');
        $password = session()->get('passUser'); 
        $cve_usuario = session()->get('cve_usuario');
        $cve_arbol = session()->get('cve_arbol'); 
        $status_1 = session()->get('status_1');
        
        $allDataBenef = sedagBenefModel::SELECT('*')->GET();

        return view('SFR.Beneficiarios.historicoBenef', compact('allDataBenef', 'logon', 'password', 'cve_usuario', 'cve_arbol', 'status_1'));
    }


    public function onEditBenef(){

        $logon = session()->get('correoUser');
        $password = session()->get('passUser'); 
        $cve_usuario = session()->get('cve_usuario');
        $cve_arbol = session()->get('cve_arbol'); 
        $status_1 = session()->get('status_1');

        return view('SFR.Beneficiarios.editarBeneficiario', compact('logon', 'password', 'cve_usuario', 'cve_arbol', 'status_1'));

    }

    public function onUpdateBenef(Request $beneficiario){

    }





}
