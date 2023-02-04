<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\sedagUsuariosModel;

class sedagUsuariosBackController extends Controller
{
    
    public function onLogonUserBack(Request $request){

            $flag = 0;

            $logon = $request -> correoFUR;
            $password = $request -> passwordFUR;

            $getUserServer = sedagUsuariosModel::SELECT('LOGIN', 'PASSLOG', 'CVE_USUARIO', 'CVE_ARBOL', 'STATUS_1')
                                                ->WHERE('LOGIN', '=', $logon)
                                                ->orWHERE('PASSLOG', '=', $password)
                                                ->first();

                            if(is_array($getUserServer) || is_object($getUserServer)){
                                foreach($getUserServer as $this-> $params){
                                   echo $params -> login; 
                                   echo $params -> passlog;
                                }
                            }
                                   
                    
                                    /*
                    $getInCompLogon = strcmp($getUserServer->login, $logon);
                    $getInCompPass = strcmp($getUserServer->passlog, $password);
                    */

                    $getInCompLogon = strcmp($params -> login, $logon);
                    $getInCompPass = strcmp($params -> passlog, $password);
                                    
                    $comparation = (($getInCompLogon  || $getInCompPass) === 0) ?: $flag = 1;
             
           
            if(!$getUserServer){
                    $flag = 2;
                    
                }
        $this->caseStatement($flag);

        
    }



    public function caseStatement($flag){
            
            switch($flag){
                case 1:

                    return back()->withInput()->withErrors(['isIfToInputs']);

                    break;

                case 2: 

                    return back()->withInput()->withErrors(['isIfNotOnServer']);

                    break;
            }
    }

    

}
