<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as Requested;
use Request;
use App\jovBenefModel;
class personController extends Controller
{

    public function onAllPerson(){
        $personRet = jovBenefModel::All();
        return $personRet;

    }
    public function onCreatePerson(Requested $request){
        $personUP = new jovBenefModel();
        $personUP -> PATERNO_A = $request -> apellP;
        $personUP -> MATERNO_A = $request -> apellM;
        $personUP -> NOMBRES_PER = $request -> Nombre;
        $personUP -> CURP_PER = $request -> CURP;
        $personUP -> GENERO_PER = $request -> Genero;
        $personUP -> FECHANA_PER = $request -> FechaNac;
        $personUP -> STAT_NAC = $request -> paisPerson;
        $personUP -> STAT_NONAC = $request -> NoEst;
        return response()->json($personUP);
    }
}
