<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as Requested;
use Request;
use App\jovBenefModel;
use App\jovBenefImagesModel;
use App\jovBenefModelSessions;
use App\jovBenefModelStatus;
use File;
class personController extends Controller
{
 
    public function onAllPerson(){
        $personRet = jovBenefModel::All();
        return $personRet;

    }

     public function onLoginStatus(Requested $request){
        $validatePerson = jovBenefModel::select('CURP_PER')->where('CURP_PER', '=', 'MAMB990504HMCRLR03')->first();
        if($validatePerson){
             return response("Se encontró un usuario", 200)->header('Content-Type', 'text/plain');
                  
        }
        return response("No se encontró un usuario", 500)->header('Content-Type', 'text/plain');
    }


 public function onLoginStatusTestJson($CURP){
        $validatePerson = jovBenefModel::select('CURP_PER')->where('CURP_PER', '=', $CURP)->first();
        if($validatePerson){
             return response()->json(
                                        $validatePerson
                                        );
                  
        }
        return response()->json(['curp_per' => 'non']);
    }

    public function onLoginStatusTestJsonForAuth($PIN){
            $validatePerson = jovBenefModelSessions::select('CURP_PER')->where('PIN_BENEF', '=', $PIN)->first();
            if(!$validatePerson){
                return response()->json(['pin_benef' => 'non']);
            }
            return response()->json([$validatePerson,
                                    'pin_benef' => 'is'
                                        ]);
    }

// Revision
    public function onLoginStatusTestJsonForAuthPIN($CURP){
        $validatePerson = jovBenefModelSessions::select('PIN_BENEF')->where('CURP_PER', '=', $CURP)->first();
        if(!$validatePerson){
            return response()->json(['pin_benef' => 'non']);
        }
        return response()->json([$validatePerson,
                                'pin_benef' => 'is'
                                ]);
}

        


    
/*
public function onLoginStatusTestJsonin(){
        $validatePerson = jovBenefModel::select('CURP_PER')->where('CURP_PER', '=', Request::input('curpPerson'))->first();
        if($validatePerson){
             return response()->json($validatePerson);
                  
        }else{

        }
        return response()->json(['curp_per' => 'non']);
    }

*/
    public function onCreatePerson(Requested $request){
         $personUP = new jovBenefModel();
        $personUP -> CURP_PER = $request -> curpPerson;
        $personUP -> PATERNO_A = $request -> apellidoP;
        $personUP -> MATERNO_A = $request -> apellidoM;
        $personUP -> NOMBRES_PER = $request -> nombrePerson;
        $personUP -> GENERO_PER = $request -> generoPerson;
        $personUP -> FECHANA_PER = $request -> fechaBirPerson;
        $personUP -> STAT_NAC = $request -> paisPerson;
        $personUP -> STAT_NONAC = $request -> noEstPerson;
        $personUP -> save();
        return response()->json($personUP);
    }


        public function DecodeRequestPhoto($theImage){
                $theImage = str_replace('data:image/jpg;base64,', '', $theImage);
                $theImage = str_replace(' ', '+', $theImage);
                return base64_decode($theImage);
        }

    public function onCreateImages(Requested $request){
        
        $imagesPerson = new jovBenefImagesModel();

        //$SessioSimulated = Request::input('curp_per');
         $compro =      $request -> curp_per.'_'.'ComprobanteEs' . '.' . 'jpg';
         $curpfoto =    $request -> curp_per.'_'.'Curp' . '.' . 'jpg';
         $actaN =       $request -> curp_per.'_'.'actaNac' . '.' . 'jpg';
         $indentadver = $request -> curp_per.'_'.'indenFotoAdver' . '.' . 'jpg';
         $indentrever = $request -> curp_per.'_'.'indenFotoRever' . '.' . 'jpg';
         $FURED =       $request -> curp_per.'_'.'DocFUR' . '.' . 'jpg';
        
        $storeInPathcompro = public_path('/storage/'.$compro);
        $storeInPathcurpfoto = public_path('/storage/'.$curpfoto);
        $storeInPathactaN = public_path('/storage/'.$actaN);
        $storeInPathindentadver = public_path('/storage/'.$indentadver);
        $storeInPathindentrever = public_path('/storage/'.$indentrever);
        $storeInPathFURED = public_path('/storage/'.$FURED);

        $comproo = $request -> comprobante_es;
        $curpfotoo = $request -> curp_ph;
        $actaNN = $request -> acta_nac;
        $indentadverR = $request -> indent_ine_adver;
        $indentreverR = $request -> indent_ine_rever;
        $FUREDD = $request -> benef_fur;

        
        $comproDEC = $this->DecodeRequestPhoto($comproo);
        $curpfotoDEC = $this->DecodeRequestPhoto($curpfotoo);
        $actaNDEC = $this->DecodeRequestPhoto($actaNN);
        $indentadverDEC = $this->DecodeRequestPhoto($indentadverR);
        $indentreverDEC = $this->DecodeRequestPhoto($indentreverR);
        $FUREDDEC = $this->DecodeRequestPhoto($FUREDD);


        File::put($storeInPathcompro, $comproDEC);
        File::put($storeInPathcurpfoto, $curpfotoDEC);
        File::put($storeInPathactaN, $actaNDEC);
        File::put($storeInPathindentadver, $indentadverDEC);
        File::put($storeInPathindentrever, $indentreverDEC);
        File::put($storeInPathFURED, $FUREDDEC);

        $imagesPerson -> CURP_PER =             $request -> curp_per;
        $imagesPerson -> COMPROBANTE_ES =       $compro;
        $imagesPerson -> CURP_PH =              $curpfoto;
        $imagesPerson -> ACTA_NAC =             $actaN;
        $imagesPerson -> IDENT_INE_ADVER =      $indentadver;
        $imagesPerson -> IDENT_INE_REVER =      $indentrever;
        $imagesPerson -> BENEF_FUR =            $FURED;
        
        $imagesPerson -> save();
        return response()->json($imagesPerson);
    }


    public function onCreatePIN(Requested $request){
        $personUP = new jovBenefModelSessions();
        $personUP -> CURP_PER = $request -> curp_per;
        $personUP -> PIN_BENEF = $request -> pin_benef;
        $personUP -> save();
        return response()->json($personUP);     
    }

    public function onCreateBitPerson(Requested $request){

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

        $personUP = new jovBenefModelStatus();
        $personUP -> CURP_PH =    $request -> curp_per;
        $personUP -> IP_BENEF =   $ip_benef;
        $personUP -> save();
        return response()->json($personUP);
    }

}
