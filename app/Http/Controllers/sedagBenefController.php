<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\sedagBenefModel;
use App\catEdosCvlModel;
use App\catGrEtosModel;
use App\catProgramasModel;

use File;
use Illuminate\Support\Facades\DB;

class sedagBenefController extends Controller
{
    

	public function statusCurp($CURP){

		$isInCurp = sedagBenefModel::SELECT("TIPO_BENEFICIARIO", 
											"PRIMER_APELLIDO", 
											"SEGUNDO_APELLIDO",
											"NOMBRES",
											"FECHA_NACIMIENTO",
											"SEXO",
											"CURP",
											"CVE_ENTIDAD_FEDERATIVA")
							->WHERE("CURP", $CURP)->FIRST();
				if(!$isInCurp){
						return response()->json(['success' => '0']);		
				}	
						return response()->json(['success' => $isInCurp]);

	}




	public function newPersonBenef(Request $request){

		$ifExist = sedagBenefModel::SELECT('CURP')->WHERE('CURP', $request -> curp)->first();

		if($ifExist){
			return response()->json(['exist' => '1']);
		}else{

       $newBenef = new sedagBenefModel();


          if (getenv('HTTP_CLIENT_IP')) {
                $ip = getenv('HTTP_CLIENT_IP');
            } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
                $ip = getenv('HTTP_X_FORWARDED_FOR');
            } elseif (getenv('HTTP_X_FORWARDED')) {
                $ip = getenv('HTTP_X_FORWARDED');
            } elseif (getenv('HTTP_FORWARDED_FOR')) {
                $ip = getenv('HTTP_FORWARDED_FOR');
            } elseif (getenv('HTTP_FORWARDED')) {
                $ip = getenv('HTTP_FORWARDED');
            } else {
                $ip = $_SERVER['REMOTE_ADDR'];
            } 


           $compro =      $request -> curp.'_'.'ComprobanteEs' . '.' . 'jpg';
           $curpfoto =    $request -> curp.'_'.'Curp' . '.' . 'jpg';
           $indentadver = $request -> curp.'_'.'indenFotoAdver' . '.' . 'jpg';
           $indentrever = $request -> curp.'_'.'indenFotoRever' . '.' . 'jpg';
           $FURED =       $request -> curp.'_'.'DocFUR' . '.' . 'jpg';
          
          $storeInPathcompro = public_path('/storage/'.$compro);
          $storeInPathcurpfoto = public_path('/storage/'.$curpfoto);
          $storeInPathindentadver = public_path('/storage/'.$indentadver);
          $storeInPathindentrever = public_path('/storage/'.$indentrever);
          $storeInPathFURED = public_path('/storage/'.$FURED);

          $comproo = $request -> COP_FOT_COMPROBANTE;
          $curpfotoo = $request -> COP_FOT_CURP;
          $indentadverR = $request -> COP_FOT_IDEN_AD;
          $indentreverR = $request -> COP_FOT_IDEN_REV;
          $FUREDD = $request -> COP_FOT_FUR;

          
          $comproDEC = $this->DecodeRequestPhoto($comproo);
          $curpfotoDEC = $this->DecodeRequestPhoto($curpfotoo);
          $indentadverDEC = $this->DecodeRequestPhoto($indentadverR);
          $indentreverDEC = $this->DecodeRequestPhoto($indentreverR);
          $FUREDDEC = $this->DecodeRequestPhoto($FUREDD);


          File::put($storeInPathcompro, $comproDEC);
          File::put($storeInPathcurpfoto, $curpfotoDEC);
          File::put($storeInPathindentadver, $indentadverDEC);
          File::put($storeInPathindentrever, $indentreverDEC);
          File::put($storeInPathFURED, $FUREDDEC);


          $controlCveEts = DB::table('CAT_ESTADO_CIVIL')->where('ESTADO_CIVIL', $request -> cve_estado_civil)->value('CVE_ESTADO_CIVIL');
          $controlCveGrs = DB::table('CAT_GRADO_ESTUDIO')->where('GRADO_ESTUDIOS', $request -> cve_grado_estudios)->value('CVE_GRADO_ESTUDIOS');  

          $cve_depeVal = DB::table('CAT_PROGRAMAS_APP')->where('DEPENDENCIA', trim($request -> cve_dependencia))->value('CVE_DEPENDENCIA');
      
      $newBenef -> N_PERIODO = date('Y');

      if(isset($request -> cve_programa)){
         
              $cve_progVal = DB::table('CAT_PROGRAMAS_APP')->where('PROGRAMA', trim($request -> cve_programa))->value('CVE_PROGRAMA');
            //$cve_progVal = catProgramasModel::select('CVE_PROGRAMA')->WHERE('PROGRAMA', $request -> cve_programa)->GET();
              $newBenef -> CVE_PROGRAMA = $cve_progVal;
      
    
      } else{

           $newBenef -> OTR_PROGRAMA = $request -> otr_programa;
      }

       $newBenef  -> CVE_DEPENDENCIA = $cve_depeVal;

           
    
      $newBenef -> CVE_ESTADO_CIVIL = $controlCveEts;
      $newBenef -> CVE_GRADO_ESTUDIOS = $controlCveGrs;

      $newBenef -> TIPO_BENEFICIARIO = "B";
      $newBenef -> PRIMER_APELLIDO = $request -> primer_apellido;
      $newBenef -> SEGUNDO_APELLIDO = $request -> segundo_apellido;
      $newBenef -> NOMBRES = $request -> nombres;
      $newBenef -> NOMBRE_COMPLETO = $request -> primer_apellido." ".$request -> segundo_apellido." ".$request-> nombres;
      $newBenef -> FECHA_NACIMIENTO = $request -> fecha_nacimiento;


          $newBenef -> SEXO = $request -> sexo;
          $newBenef -> CURP = $request -> curp;


        if(isset($FUREDD)){
            $newBenef -> CVE_DOCUMENTO = "12";  
        }

          $newBenef -> COP_FOT_COMPROBANTE =       $compro;
          $newBenef -> COP_FOT_CURP =              $curpfoto;
          $newBenef -> COP_FOT_IDEN_AD =      $indentadver;
          $newBenef -> COP_FOT_IDEN_REV =      $indentrever;
          $newBenef -> COP_FOT_FUR =            $FURED;

          if(($request -> cve_entidad_federativa) == "MC"){
              $newBenef -> CVE_ENTIDAD_FEDERATIVA = "15"; 
          }else{
              $newBenef -> CVE_ENTIDAD_FEDERATIVA = $request -> cve_entidad_federativa;
          }

          $newBenef -> IP_USER_C = $ip;
          $newBenef -> C_USER = $request -> c_user;

       
            $newBenef -> save();

          
                return response()->json(['status' => '3']);

    }
         
    	
    }

    //Maybe logic change   
    public function DecodeRequestPhoto($theImage){
        $theImage = str_replace('data:image/jpg;base64,', '', $theImage);
        $theImage = str_replace(' ', '+', $theImage);
        return base64_decode($theImage);
		}
}



