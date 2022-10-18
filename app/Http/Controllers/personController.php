<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as Requested;
use Request;
use App\jovBenefModel;
use App\jovBenefImagesModel;
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
        $status = false;
        $validatePerson = jovBenefModel::select('CURP_PER')->where('CURP_PER', '=', $CURP)->first();
        if($validatePerson){
             return response()->json(
                                        $validatePerson
                                        );
                  
        }
        return response()->json($status);
    }
    

public function onLoginStatusTestJsonin(){
        $validatePerson = jovBenefModel::select('CURP_PER')->where('CURP_PER', '=', Request::input('curpPerson'))->first();
        if($validatePerson){
             return response()->json($validatePerson);
                  
        }
        return response()->json($validatePerson);
    }


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
        




        /*

        $CurpID = $request -> curp_per;
        $compro = $request-> comprobante_es;
        $curpfoto = $request -> curp_ph;
        $actaN = $request -> acta_nac;
        $indentadver = $request -> indent_ine_adver;
        $indentrever = $request -> indent_ine_rever;
        $FURED = $request -> benef_fur;
        $imagesPerson -> BENEF_FUR = $request -> benef_fur;

        $file1 = $CurpID.'_'.$request->file('comprobante_es')->getClientOriginalName();
        $file2 = $CurpID.'_'.$request->file('curp_ph')->getClientOriginalName();
        $file3 = $CurpID.'_'.$request->file('acta_nac')->getClientOriginalName();
        $file4 = $CurpID.'_'.$request->file('indent_ine_adver')->getClientOriginalName();
        $file5 = $CurpID.'_'.$request->file('indent_ine_rever')->getClientOriginalName();
        $file6 = $CurpID.'_'.$request->file('benef_fur')->getClientOriginalName();

        
*/

        /*
        $imagesPersonRes -> CURP_PER =             $request -> curp_per;
        $imagesPersonRes -> COMPROBANTE_ES =       $request -> Request::input('comprobante_es');
        $imagesPersonRes -> CURP_PH =              $request -> Request::input('curp_ph');
        $imagesPersonRes -> ACTA_NAC =             $request -> Request::input('acta_nac');
        $imagesPersonRes -> IDENT_INE_ADVER =      $request -> Request::input('indent_ine_adver');
        $imagesPersonRes -> IDENT_INE_REVER =      $request -> Request::input('indent_ine_rever');
        $imagesPersonRes -> BENEF_FUR =             $request -> Request::input('benef_fur');
        */
        $imagesPerson -> save();
        return response()->json($imagesPerson);
    }


   
}

