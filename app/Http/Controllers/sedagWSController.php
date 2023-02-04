<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class sedagWSController extends Controller
{
    

   public function WB($CURP){
   		

        $client = new Client();
    
        $response = $client->request(
            'GET',
            'https://www.curp.cdmx.gob.mx/curp/rest/curp/' . $CURP,
            ['auth' => ['finanzas', 'F1n4nz445!2020'], 'verify' => false]
        );
      
        $data_repuve = $response->getBody()->getContents();
      
        $data = json_decode($data_repuve, true);



        return response()->json($data);

 

  }
}
