<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\jovBenefModelSessions;

class jovBenefPINController extends Controller
{

    public function getAllPins(){
        $getPinsPass = jovBenefModelSessions::All();
        if(!$getPinsPass){
            return response()->json(['status' => 'non']);
        }
            return $getPinsPass;
    }

    public function postPinPass(Requested $request){
        $PIN = new jovBenefModelSessions();
        $PIN -> CURP_PER = $request -> curp_per;
        $PIN -> PIN_BENEF = $request -> pin_benef;
        if(!$PIN){
            return response()->json(['status' => 'non']);
        }else{
            $PIN -> save();
            return response()->json($PIN);
        }
       
    }


    public function getOnPersonWithPIN($PIN){
        $validatePerson = jovBenefModelSessions::join('JOVMOVI_BENEF', 'JOVMOVI_BENEF.CURP_PER', '=', 'JOVMOVI_PINUNIQUE.CURP_PER')
        ->select('JOVMOVI_BENEF.PATERNO_A', 'JOVMOVI_BENEF.MATERNO_A', 'JOVMOVI_BENEF.NOMBRES_PER', 'JOVMOVI_PINUNIQUE.CURP_PER')
        ->where('JOVMOVI_PINUNIQUE.PIN_BENEF', '=', $PIN)->first();

        return response()->json([$validatePerson,
                                'pin_benef' => 'is'
                                    ]);
    }

    public function getOnPersonWithPINT($PIN){
        $validatePerson = jovBenefModelSessions::join('FURWEB_METADATO_SR2022RESV1', 'FURWEB_METADATO_SR2022RESV1.CURP', '=', 'JOVMOVI_PINUNIQUE.CURP_PER')
        ->select('FURWEB_METADATO_SR2022RESV1.PRIMER_APELLIDO', 'FURWEB_METADATO_SR2022RESV1.SEGUNDO_APELLIDO', 'FURWEB_METADATO_SR2022RESV1.NOMBRES', 'JOVMOVI_PINUNIQUE.CURP_PER')
        ->where('JOVMOVI_PINUNIQUE.PIN_BENEF', '=', $PIN)->first();
        
        if(!$validatePerson){
            return response()->json(['pin_benef' => 'non']);
        }

        return response()->json([$validatePerson,
                                'pin_benef' => 'is'
                                    ]);
    }

    public function getDirectPersonWithPin($PIN){
        $validatePerson = jovBenefModelSessions::select('CURP_PER')->where('PIN_BENEF', '=', $PIN)->first();
        if(!$validatePerson){
            return response()->json(['pin_benef' => 'non']);
        }
        return response()->json([$validatePerson,
                                'pin_benef' => 'is'
                                    ]);
    }
}
