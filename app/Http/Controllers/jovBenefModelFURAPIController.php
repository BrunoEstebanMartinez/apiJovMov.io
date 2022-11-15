<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as Requested;
use App\jovBenefModelFUR;
use Request;
use File;

class jovBenefModelFURAPIController extends Controller
{

    //Table FURWEB 

    public function retrivePersonFUR(){
    		$listPersonBenef = jovBenefModelFUR::All();
    		return $listPersonBenef;
    }

    public function postOnPersonFUR(Requested $request){
            //
            date_default_timezone_set("America/Mexico_City");
            $currDSimYear = date("Y");
            $currDSim = date("D/M/Y");

            if (getenv('HTTP_CLIENT_IP')) {
                $ip_benef = getenv('HTTP_CLIENT_IP');
            } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
                $ip_benef = getenv('HTTP_X_FORWARDED_FOR');  
            } elseif (getenv('HTTP_X_FORWARDED')) {
                $ip_benef = getenv('HTTP_X_FORWARDED');
            } elseif (getenv('HTTP_FORWARDED_FOR')) {
                $ip_benef = getenv('HTTP_FORWARDED_FOR');
            } elseif (getenv('HTTP_FORWARDED')) {
                $ip_benef = getenv('HTTP_FORWARDED');
            } else {
                $ip_benef = $_SERVER['REMOTE_ADDR'];
            }       

            $newBenefInApp = new jovBenefModelFUR();
            $newBenefInApp -> N_PERIODO = $currDSimYear;
            $newBenefInApp -> PRIMER_APELLIDO = $request -> apellidoP;
            $newBenefInApp -> SEGUNDO_APELLIDO = $request -> apellidoM;
            $newBenefInApp -> NOMBRES = $request -> nombrePerson;
            $newBenefInApp -> FECHA_NACIMIENTO = $request -> fechaBirPerson;
            $newBenefInApp -> SEXO = $request -> generoPerson; 
            $newBenefInApp -> CURP = $request -> curpPerson;
            $newBenefInApp -> CVE_ENTIDAD_FEDERATIVA = $request -> noEstPerson;
            $newBenefInApp -> RED_SOCIAL = $request -> paisPerson;
            $newBenefInApp -> STATUS_1 = 1;
            $newBenefInApp -> STATUS_2 = 1;
            $newBenefInApp -> FECHA_REG = $currDSim;
            $newBenefInApp -> IP = $ip_benef;
            $newBenefInApp -> save();
            return response()->json($newBenefInApp);
        }

    public function getOnPersonFURCURP($CURP){
        $validatePerson = jovBenefModelFUR::select('CURP', 'NOMBRES', 'PRIMER_APELLIDO', 'SEGUNDO_APELLIDO')->where('CURP_PER', '=', $CURP)->first();
        if($validatePerson){
             return response()->json(
                                        $validatePerson
                                        );         
        }
        return response()->json(['curp_per' => 'non']);
    }



}
