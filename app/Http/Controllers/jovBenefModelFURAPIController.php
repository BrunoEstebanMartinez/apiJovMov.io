<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as Requested;
use App\jovBenefModelFUR;
use App\catProgramasModel;
use Request;
use File;

class jovBenefModelFURAPIController extends Controller
{

    //Table FURWEB 

    public function retrivePersonFUR(){
            
    		$listPersonBenef = jovBenefModelFUR::All();
            
    		return response() -> json(['511' => $listPersonBenef]
                                        );
    }

    public function retriveProgramas(){

        $listDependencias = catProgramasModel::SELECT('CVE_DEPENDENCIA', 'DEPENDENCIA')->DISTINCT()->GET();

        $listProgramas    = catProgramasModel::SELECT('CVE_PROGRAMA','PROGRAMA')->GET();


        return response() -> json(
                            [
                            'dependencias' => $listDependencias, 
                            'programas' => $listProgramas,
                            'success' => '1'
                            ]);
    }

    public function retriveDepenOProg($DEPEN){
                $getData = catProgramasModel::SELECT('CVE_DEPENDENCIA', 'CVE_PROGRAMA', 'PROGRAMA')->WHERE('DEPENDENCIA', '=', $DEPEN)->DISTINCT()->GET();

                if($getData){
                         return response() -> json(
                                        [
                                            'programaDetalle' => $getData
                                        ]
                                            );     
                }else{
                     return response()->json(['ERROR' => 'Sin dato']);
                       
                }
    }

    public function retriveProgDetalle($PROG){
        $getData = catProgramasModel::SELECT('CVE_DEPENDENCIA', 'DEPENDENCIA', 'CVE_PROGRAMA', 'PROGRAMA')->WHERE('PROGRAMA', '=', $PROG)->GET();

        if($getData){
                return response() -> json([
                                        'programaEspec' => $getData
                                        ]);
        }else{
            return response()->json(['ERROR' => 'Sin dato']);
        }
    }

   

    public function postOnPersonFUR(Requested $request){
            //
            date_default_timezone_set("America/Mexico_City");
            $currDSimYear = date("Y");
            $currDSim = date("d/m/y");

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
            $newBenefInApp -> CVE_PROGRAMA = 511;
            $newBenefInApp -> PRIMER_APELLIDO = $request -> apellidoP;
            $newBenefInApp -> SEGUNDO_APELLIDO = $request -> apellidoM;
            $newBenefInApp -> NOMBRES = $request -> nombrePerson;
            //$isDate = $request -> fechaBirPerson;
            $newBenefInApp -> FECHA_NACIMIENTO = '04/05/99';
            if(($request->generoPerson) == 'MUJER'){
                $newBenefInApp -> SEXO = 'M';
            }else{
                $newBenefInApp -> SEXO = 'H';    
            }
            $newBenefInApp -> CURP = $request -> curpPerson;
            $newBenefInApp -> CVE_ENTIDAD_FEDERATIVA = $request -> noEstPerson;
            $newBenefInApp -> RED_SOCIAL = $request -> paisPerson;
            $newBenefInApp -> STATUS_1 = 'N';
            $newBenefInApp -> STATUS_2 = 'A';
            $newBenefInApp -> FECHA_REG = $currDSim;
            $newBenefInApp -> IP = $ip_benef;
            $newBenefInApp -> save();
            return response()->json($newBenefInApp);
        }

    public function getOnPersonFURCURP($CURP){
        $validatePerson = jovBenefModelFUR::select('CURP', 'NOMBRES', 'PRIMER_APELLIDO', 'SEGUNDO_APELLIDO', 'SEXO', 'FECHA_NACIMIENTO', 'RED_SOCIAL', 'CVE_ENTIDAD_FEDERATIVA')->where('CURP', '=', $CURP)->first();
        if($validatePerson){
             return response()->json([
                                        $validatePerson,
                                        'curp_per' => 'is'
                                        
                                        ]);         
        }
        return response()->json(['curp_per' => 'non']);
    }

}
