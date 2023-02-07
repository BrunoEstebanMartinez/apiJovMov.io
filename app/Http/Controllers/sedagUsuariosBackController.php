<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests\loginRequest;

use App\sedagUsuariosModel;



class sedagUsuariosBackController extends Controller{
    

    private $logon, $password, $cve_usuario, $cve_arbol, $status_1;

    public function onLogonUserBack(Request $request){

            $flag;

            $this -> logon = $request -> correoFUR;
            $this -> password = $request -> passwordFUR;

                        $getUserServer = sedagUsuariosModel::SELECT('LOGIN', 'PASSLOG', 'CVE_USUARIO', 'CVE_ARBOL', 'STATUS_1')
                                                ->WHERE('LOGIN', '=', $this -> logon)
                                                ->orWHERE('PASSLOG', '=', $this -> password)
                                                ->first();

                                                if(!$getUserServer){$flag = 2;}              

                                $getInCompLogon = strcmp($getUserServer->login, $this -> logon);
                                $getInCompPass = strcmp($getUserServer->passlog, $this -> password);
                                $this->cve_usuario = $getUserServer->cve_usuario;
                                $this->cve_arbol = $getUserServer->cve_arbol;
                                $this->status_1 = $getUserServer->status_1;

                                $comparation = (($getInCompLogon  || $getInCompPass) == 0) ?  $flag = 0 : $flag = 1;
                            
                                   
                                return $this->caseStatementLogin($request, $flag);
        
        
    }


    public function caseStatementLogin(Request $session, $flag){
            
            switch($flag){

                case 0:

                    $state = $session -> session() -> has('correoUser');
                    
                    if(!$state){

                        $session -> session() -> put('correoUser', $this->logon); 
                        $session -> session() -> put('passUser', $this->password);
                        $session -> session() -> put('cve_usuario', $this->cve_usuario);
                        $session -> session() -> put ('cve_arbol', $this->cve_arbol);
                        $session -> session() -> put ('status-_1', $this->status_1);
                    }

                        $logon = $session -> session() -> get('correoUser'); 
                        $password = $session -> session() -> get('passUser');
                        $cve_usuario = $session -> session() -> get('cve_usuario');
                        $cve_arbol = $session -> session() -> get('cve_usuario');
                        $status_1 = $session -> session() -> get('status_1');

                    if(!($cve_usuario == 'AD') || ($cve_usuario == 'SA')){
                        return view('SFR.states.menuCapture', compact('logon', 'password', 'cve_usuario', 'cve_arbol', 'status_1'));
                    };
                        
                        return view('SFR.states.menuAdmin', compact('logon', 'password', 'cve_usuario', 'cve_arbol', 'status_1'));

                    break;

                case 1:

                    return redirect()->back()->withInput()->withErrors(['isIfToInputs' => 'Correo y/o contraseña incorrectos']);

                    break;

                case 2: 

                    return redirect()->back()->withInput()->withErrors(['isIfNotOnServer' => 'No existe el usuario']);

                    break;

            
            }
    }


    public function onStateUserlevel($flag){

            switch($flag){

            }

    }

  

    

}
