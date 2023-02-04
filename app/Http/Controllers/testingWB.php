<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class testingWB extends Controller
{
    

    public function statusWB(Request $request){

        $method = 'GET';
        $URL = 'http://websdes.curp.gob.mx/WebServicesConsulta/services/ConsultaPorCurpServices?wsdl';
        
        $usuario = $request->usuario;
        $password = $request->password;
        $curp = $request->curp;

        $fullData = array(
            'tipoTransaccion' => 5,
            'auth' => [$usuario, $password],
            'direccionIp' => '208.67.222.222',
            'cveCurp' => $curp    
        );
        $fullDataTesting = array(
            'tipoTransaccion' => 5,
            'usuario' => $usuario,
            'password' => $password,
            'direccionIp' => '208.67.222.222',
            'cveCurp' => $curp    
        );

        $myclient = new Client();
        $responseWb = $myclient -> request(
            $method,
            $URL,
            ['auth' => ['WS657070188', 'Xm4j57aB'],
             'tipoTransaccion' => 5,
             'direccionIp' => '208.67.222.222',
             'cveCurp' => $curp
            ]
            
        );

        $intent = $response -> getBody();

    }

}
