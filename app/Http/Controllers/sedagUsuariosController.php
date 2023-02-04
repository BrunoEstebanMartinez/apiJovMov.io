<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;


use App\sedagUsuariosModel;
use App\catProgramasModel;

class sedagUsuariosController extends Controller
{



	public function getUserPassing(Request $request){
			
			$usuario    	= $request -> login;
			$password   	= $request -> passlog;
			$cve_servidor 	= $request -> cve_servidor;
			
			///


			$getStatusUser = sedagUsuariosModel::SELECT('CVE_DEPENDENCIA', 'CVE_PROGRAMA', 'OTR_PROGRAMA', 
														'CVE_SERVIDOR', 'LOGIN', 'PASSLOG', 'CVE_USUARIO', 
														'STATUS_1','CVE_ARBOL')
												->WHERE('LOGIN','=', $usuario)
												->ORWHERE('PASSLOG', '=', $password)
												->first();

			if($getStatusUser){



					return response()->json(['success' => $getStatusUser,
													
										]);
			}else{
					return response()->json(['success' => '0']);
	}
}


	

	
	public function onFirstReg(Request $request){

				
				$folio_rel = sedagUsuariosModel::max('FOLIO');
            	$folio_rel = $folio_rel + 1;

          

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
            

			$newuser = new sedagUsuariosModel();

			$getDay = 	date('d');
			$getMonth = date('m');
			$getYear = 	date('Y');

            $newuser -> N_PERIODO = $getYear;

            $nombrePro = $request -> nomProg;
			$nombreDepen = $request -> nomDepen; 

			$auxProOtr = $request -> otherProg;

			$cve_depeVal = DB::table('CAT_PROGRAMAS_APP')->where('DEPENDENCIA', $nombreDepen)->value('CVE_DEPENDENCIA');

			if(isset($auxProOtr)){
				$newuser->OTR_PROGRAMA = $auxProOtr;
				$newuser -> CVE_PROGRAMA = 0; 
			}else{
				$cve_progVal = DB::table('CAT_PROGRAMAS_APP')->where('PROGRAMA', $nombrePro)->value('CVE_PROGRAMA');
				$newuser -> CVE_PROGRAMA = $cve_progVal; 
			}

				$newuser -> CVE_DEPENDENCIA = $cve_depeVal; 

				$cve_sp = $request -> cve_servidor;

				$newuser->CVE_SERVIDOR = $request -> cve_servidor;	
				$newuser->FOLIO_RELACIONADO = $folio_rel.$getYear.$cve_sp;
				$newuser->IP              = $ip;
				$newuser-> LOGIN           = $request -> login;
				$newuser-> PASSLOG         = $request -> passlog;

				session(['usuario' => $request -> login, 'password' => $request -> passlog, 'cve_servidor' => $request -> cve_servidor, 'otr_programa' => $auxProOtr, 'cve_programa' => $cve_progVal, 'cve_dependencia' => $cve_depeVal]);

				$newuser -> save();

	}
	



   public function statusWB(Request $request){
   		
   		
        $client = new Client();
    
        $response = $client->request(
            'GET',
            'https://www.curp.cdmx.gob.mx/curp/rest/curp/' . $request->curp,
            ['auth' => [$request->usuario, $request->password], 'verify' => false]
        );
      
        $data_repuve = $response->getBody()->getContents();
      
        $data = json_decode($data_repuve, true);

        return response()->json($data);

 

  }


}