<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request as Requested;
use App\jovBenefImagesModel;
use Request;
use File;

class jovBenefImagesController extends Controller
{
    
    public function getAllPersonImages(){
        $getImages = jovBenefImagesModel::All();
        if(!$getImages){
            return response()->json(['status' => 'non']);
        }
        return $getImages;

    }
    
    public function postImagesPerson(Requested $request){
        
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

    //Maybe logic change   
    public function DecodeRequestPhoto($theImage){
        $theImage = str_replace('data:image/jpg;base64,', '', $theImage);
        $theImage = str_replace(' ', '+', $theImage);
        return base64_decode($theImage);
}
}
