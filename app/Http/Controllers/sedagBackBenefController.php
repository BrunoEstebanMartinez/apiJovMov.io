<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\sedagBenefModel;
use App\catLocalCodigos;
use App\catLocalidadesModel;
use App\catAllCveAndDescModel;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator; 



class sedagBackBenefController extends Controller
{
    
    protected $image1, $image2, $image3, $image4, $image5;
    protected $file1, $file2, $file, $file4, $file5;


    public function onViewAllData(){

        $logon = session()->get('correoUser');
        $password = session()->get('passUser'); 
        $cve_usuario = session()->get('cve_usuario');
        $cve_arbol = session()->get('cve_arbol'); 
        $status_1 = session()->get('status_1');
        
        $allDataBenef = sedagBenefModel::SELECT('*')
        ->orderBy('N_PERIODO', 'DESC')
        ->orderBy('FOLIO', 'DESC')
        ->PAGINATE(50);

        return view('SFR.Beneficiarios.historicoBenef', compact('allDataBenef', 'logon', 'password', 'cve_usuario', 'cve_arbol', 'status_1'));
    }


    public function onNewBenef(){

        $logon = session()->get('correoUser');
        $password = session()->get('passUser'); 
        $cve_usuario = session()->get('cve_usuario');
        $cve_arbol = session()->get('cve_arbol'); 
        $status_1 = session()->get('status_1');


        $getCvesInfo = catAllCveAndDescModel::SELECT('CVE_MUNICIPIO', 'MUNICIPIO')
        ->WHERE('CVE_ENTIDAD_FEDERATIVA', '15')
        ->DISTINCT()
        ->GET();

        $getCvesLoc = catAllCveAndDescModel::SELECT('CVE_LOC', 'NOM_LOC')
        ->WHERE('CVE_ENTIDAD_FEDERATIVA', '15')
        ->DISTINCT()
        ->GET();
        

        return view('SFR.Beneficiarios.nuevoBeneficiario', compact('logon', 'password', 'cve_usuario', 'cve_arbol', 'status_1', 'getCvesInfo', 'getCvesLoc'));

    }


    public function publicBenef(Request $newBenef){

        $logon = session()->get('correoUser');
        $password = session()->get('passUser'); 
        $cve_usuario = session()->get('cve_usuario');
        $cve_arbol = session()->get('cve_arbol'); 
        $status_1 = session()->get('status_1');

        $messages = [
            'obligatoriedad' => 'Este campo es obligatorio',
            'tamaño'         => 'El contenido es incompatible',
        ];

        $validate = Validator()->make($newBenef->all(), $messages = [
                'primer_apellido' => 'required|string|max:255',
                'segundo_apellido.obligatoriedad' => 'requiredrequired|string|max:255',
                'nombres.obligatoriedad' => 'required|string|max:255',
                'fecha_nacimiento.obligatoriedad' => 'required',
                'sexo.obligatoriedad' => 'required',
                'curp.obligatoriedad.tamaño' => 'required|min:18',
                'numeroTel.obligatoriedad.tamaño' => 'required|min:9',
                
        ]);

     

    
        $onStateCveLocalidad = DB::table('IM_LOCALIDADES')->WHERE('LOC', $newBenef -> loc_desc)
        ->DISTINCT()
        ->VALUE('CVE_LOC');

        $onStateLatLocalidad = DB::table('IM_LOCALIDADES')->WHERE('CVE_LOC', $onStateCveLocalidad)
        ->DISTINCT()
        ->VALUE('LATITUD');

        $onStateLongLocalidad = DB::table('IM_LOCALIDADES')->WHERE('CVE_LOC', $onStateCveLocalidad)
        ->DISTINCT()
        ->VALUE('LONGITUD');

        $this -> image1 = $newBenef ->cop_fot_iden_ad;
        $this -> image2 = $newBenef ->cop_fot_iden_rev;
        $this -> image3 = $newBenef ->cop_fot_comp;
        $this -> image4 = $newBenef ->cop_fot_curp;
        $this -> image5 = $newBenef ->cop_fot_fur;

        $inFetch = array($this -> image1, 
                        $this -> image2,
                        $this -> image3,
                        $this -> image4,
                        $this -> image5);

        foreach($inFetch as $images){
            if(!empty($images) && isset($images) && hasFile('images')){
                $this -> $file1 = $inFetch['0']." ".$newBenef->curp." ".$newBenef->file('cop_fot_iden_ad')->getClientOriginalName();
                $this -> $file2 = $inFetch['1']." ".$newBenef->curp." ".$newBenef->file('cop_fot_iden_rev')->getClientOriginalName();
                $this -> $file3 = $inFetch['2']." ".$newBenef->curp." ".$newBenef->file('cop_fot_comp')->getClientOriginalName();
                $this -> $file4 = $inFetch['3']." ".$newBenef->curp." ".$newBenef->file('cop_fot_curp')->getClientOriginalName();
                $this -> $file5 = $inFetch['4']." ".$newBenef->curp." ".$newBenef->file('cop_fot_fur')->getClientOriginalName();

                $newBenef->file('cop_fot_iden_ad')->move(public_path().'/storage/',$file1);
                $newBenef->file('cop_fot_iden_rev')->move(public_path().'/storage/',$file2);
                $newBenef->file('cop_fot_comp')->move(public_path().'/storage/',$file3);
                $newBenef->file('cop_fot_curp')->move(public_path().'/storage/',$file4);
                $newBenef->file('cop_fot_fur')->move(public_path().'/storage/',$file5);
            }
        }

                
        
        $newBenefSys = new sedagBenefModel();

        $newBenefSys->PRIMER_APELLIDO = $newBenef->primer_apellido;
        $newBenefSys->SEGUNDO_APELLIDO = $newBenef->segundo_apellido;
        $newBenefSys->NOMBRES = $newBenef->nombres;
        $newBenefSys->NOMBRE_COMPLETO = $newBenef->primer_apellido." ".$newBenef->segundo_apellido." ".$newBenef->nombres;
        $newBenefSys->FECHA_NACIMIENTO = date('d/m/Y', strtotime($newBenef->fecha_nacimiento));
        $newBenefSys->SEXO = $newBenef -> genero;
        $newBenefSys->CURP = $newBenef->curp;
        $newBenefSys->CVE_MUNICIPIO =$onStateCveMunicipio;
        $newBenefSys->DESC_MUNICIPIO = $newBenef -> desc_municipio;
        $newBenefSys->CVE_LOCALIDAD = $onStateCveLocalidad;
        $newBenefSys->DESC_LOCALIDAD = $newBenef -> desc_localidad;
        $newBenefSys->LOC_LATDEC = $onStateLatLocalidad;
        $newBenefSys->LOC_LONGDEC = $onStateLongLocalidad;
        $newBenefSys->CALLE = $newBenef->calle;
        $newBenefSys->NUM_EXT = $newBenef->numero_exterior;
        $newBenefSys->NUM_INT = $newBenef->numero_interior;
        $newBenefSys->MANZANA = $newBenef->manzana;
        $newBenefSys->LOTE = $newBenef->lote;
        $newBenefSys->CODIGO_POSTAL = $newBenef->codigo_postal;
        $newBenefSys->ENTRE_CALLE = $newBenef->entre_calle;
        $newBenefSys->OTRA_REFERENCIA = $newBenef->otr_referencia;
        $newBenefSys->TELEFONO = $newBenef->telefono;
        $newBenefSys->CORREO_ELECTRONICO = $newBenef->correo_electronico;
        

        if(!$validate -> fails()){
            $newBenefSys -> save();
        }else{
            return redirect()
                    ->route('nuevo')
                    ->withErrors($validate)
                    ->withInput();
        }
        
        if(!$newBenefSys->save() == true){
            return redirect()->back()->withInput()->withErrors(['ifSomething' => 'Algo salió mal. Intente mas tarde']);
        }
            return redirect()->route('verHistorico');
                
    }

    public function onEditBenef($getFolio){

        $logon = session()->get('correoUser');
        $password = session()->get('passUser'); 
        $cve_usuario = session()->get('cve_usuario');
        $cve_arbol = session()->get('cve_arbol'); 
        $status_1 = session()->get('status_1');

    
        $allDataBenef = sedagBenefModel::SELECT('*')
                        ->WHERE('FOLIO', $getFolio)
                        ->first();

                        $getCvesEntidad = catAllCveAndDescModel::SELECT('CVE_ENTIDAD_FEDERATIVA', 'ENTIDAD_FEDERATIVA')
                        ->DISTINCT()
                        ->GET();
        
                        $getCvesInfo = catAllCveAndDescModel::SELECT('CVE_MUNICIPIO', 'MUNICIPIO')
                        ->WHERE('CVE_ENTIDAD_FEDERATIVA', '15')
                        ->DISTINCT()
                        ->GET();

                        $getCvesLoc = catAllCveAndDescModel::SELECT('CVE_LOC', 'NOM_LOC')
                        ->WHERE('CVE_ENTIDAD_FEDERATIVA', '15')
                        ->DISTINCT()
                        ->GET();
 

        return view('SFR.Beneficiarios.editarBeneficiario', compact('logon', 'password', 'cve_usuario', 'cve_arbol', 'status_1', 'allDataBenef', 'getCvesInfo', 'getCvesLoc', 'onGetEntidadFeder', 'getCvesEntidad'));

    }





    



    public function onUpdateBenef(Request $request, $folio){

        $logon = session()->get('correoUser');
        $password = session()->get('passUser'); 
        $cve_usuario = session()->get('cve_usuario');
        $cve_arbol = session()->get('cve_arbol'); 
        $status_1 = session()->get('status_1');

        $onStateCveMunicipio = DB::table('IM_LOCALIDADES')->WHERE('MUNICIPIO', $request->municipio_desc)
        ->DISTINCT()
        ->VALUE('CVE_MUNICIPIO');

        $onStateCveLocalidad = DB::table('IM_LOCALIDADES')->WHERE('NOM_LOC', $request -> loc_desc)
        ->DISTINCT()
        ->VALUE('CVE_LOC');

        $onStateLatLocalidad = DB::table('IM_LOCALIDADES')->WHERE('NOM_LOC', $request -> loc_desc)
        ->DISTINCT()
        ->VALUE('LATITUD');

        $onStateLongLocalidad = DB::table('IM_LOCALIDADES')->WHERE('NOM_LOC', $request -> loc_desc)
        ->DISTINCT()
        ->VALUE('LONGITUD');

        $this -> image1 = $request ->cop_fot_iden_ad;
        $this -> image2 = $request ->cop_fot_iden_rev;
        $this -> image3 = $request ->cop_fot_comp;
        $this -> image4 = $request ->cop_fot_curp;
        $this -> image5 = $request ->cop_fot_fur;

        $inFetch = array($this -> image1, 
                        $this -> image2,
                        $this -> image3,
                        $this -> image4,
                        $this -> image5);

        foreach($inFetch as $images){
            if(!empty($images) && isset($images)){
                $flag = 1;
            }
        }

        $onUpdate = sedagBenefModel::WHERE('FOLIO', $folio)
            ->update([

                'PRIMER_APELLIDO' => $request -> primer_apellido,
                'SEGUNDO_APELLIDO' => $request -> segundo_apellido,
                'NOMBRES' => $request -> nombres,
                'NOMBRE_COMPLETO' => $request->primer_apellido." ".$request->segundo_apellido." ".$request->nombres,
                'FECHA_NACIMIENTO' => date('d/m/Y', strtotime($request->fecha_nacimiento)),
                'SEXO' => $request -> genero,
                'DESC_ENTIDAD_FEDERATIVA' => $request -> entidad_nacimiento,
                'CVE_MUNICIPIO' => $onStateCveMunicipio,
                'DESC_MUNICIPIO' => $request -> municipio_desc,
                'CVE_LOCALIDAD' => $onStateCveLocalidad,
                'DESC_LOCALIDAD' => $request->loc_desc, 
                'LOC_LATDEC' => $onStateLatLocalidad,
                'LOC_LONGDEC' => $onStateLongLocalidad,
                'CALLE' => $request -> calle,
                'NUM_EXT' => $request -> no_exterior,
                'NUM_INT' => $request -> no_interior,
                'MANZANA' => $request -> manzana,
                'LOTE' => $request -> lote,
                'CODIGO_POSTAL' => $request -> codigo_postal,
                'ENTRE_CALLE' => $request -> entre_calle,
                'OTRA_REFERENCIA' => $request -> otr_referencia,
                'TELEFONO' => $request -> numeroTel,
                'CORREO_ELECTRONICO' => $request -> correo_electron
            ]);
        
        if($onUpdate){
            return redirect()->route('verHistorico');
        }else{
            return redirect()->back()->withInput()->withErrors(['isSomething' => 'Algo salió mal. Intente de nuevo']);
        }

    }





}
