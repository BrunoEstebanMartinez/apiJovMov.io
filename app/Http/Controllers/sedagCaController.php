<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\catProgramasModel;
use App\catEdosCvlModel;
use App\catGrEtosModel;

class sedagCaController extends Controller{
    //Table FURWEB 

    public function retrivePersonFUR(){
            
    		$listPersonBenef = jovBenefModelFUR::All();
            
    		return response() -> json(['511' => $listPersonBenef]
                                        );
    }

    public function retriveData(){

        $listDependencias = catProgramasModel::SELECT('CVE_DEPENDENCIA', 'DEPENDENCIA')->DISTINCT()->GET();

        $listProgramas    = catProgramasModel::SELECT('CVE_PROGRAMA','PROGRAMA')->GET();


        return response() -> json(
                            [
                            'dependencias' => $listDependencias, 
                            'programas' => $listProgramas,
                            'success' => '1'
                            ]);
    }

    public function retriveDepenOProg($NOMBRE){
                
                $setData = catProgramasModel::SELECT('CVE_DEPENDENCIA', 'DEPENDENCIA', 'CVE_PROGRAMA', 'PROGRAMA', 'VERTIENTE')->WHERE('DEPENDENCIA', '=', $NOMBRE)->DISTINCT()->GET();


                if($setData){
                         return response() -> json(
                                        [
                                            'programaDetalle' => $setData
                                        ]
                                            );     
                }else{
                     return response()->json(['ERROR' => 'Sin dato']);
                       
                }
    }

    public function retriveProgDetalle($NOMBRE){
        $setData = catProgramasModel::SELECT('CVE_PROGRAMA', 'PROGRAMA', 'VERTIENTE')->WHERE('DEPENDENCIA','=', $NOMBRE)->DISTINCT()->GET();

        if($setData){
                return response() -> json([
                                        'programaEspec' => $setData
                                        ]);
        }else{
            return response()->json(['ERROR' => 'Sin dato']);
        }
    }


    public function retriveDataAux(){
        $listGrdosEstudios  = catGrEtosModel::SELECT('*')->GET();
        $listEstCviles      = catEdosCvlModel::SELECT('*')->GET();

        return response() -> json(
                            [
                            'grados' => $listGrdosEstudios, 
                            'estados' => $listEstCviles,
                            'success' => '1'
                            ]);


    }

      public function getStudios(){

            $getData = catGrEtosModel::SELECT('GRADO_ESTUDIOS')->GET();

            if(!$getData){
                return response() -> json([
                                'success' => '0']);
            }
            return response() -> json([
                                        'grados' => $getData
                                        ]);     
    }

  

    public function getCviles(){

            $setData = catEdosCvlModel::SELECT('ESTADO_CIVIL')->GET();

            if($setData){
                return response() -> json([
                                        'estados' => $setData
                                        ]);
            }else{
            return response()->json(['ERROR' => 'Sin dato']);
            }  

    }

}
