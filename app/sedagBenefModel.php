<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sedagBenefModel extends Model
{
    protected $table = "FURWEB_METADATO_SEDGO2023";
    protected $primaryKey = ['FOLIO'];
    protected $fillable = [
    	'N_PERIODO',
		'FOLIO',
		'FOLIO_RELACIONADO',
		'CVE_PROGRAMA',
		'OTR_PROGRAMA',
		'CVE_DEPENDENCIA',
		'TIPO_BENEFICIARIO',
		'PRIMER_APELLIDO',
		'SEGUNDO_APELLIDO',
		'NOMBRES',
		'NOMBRE_COMPLETO',
		'FECHA_NACIMIENTO',
		'SEXO',
		'CURP',
		'RFC',
		'FOLIO_ID_OFICIAL',
		'CVE_BENEFICIO',
		'CVE_ESTADO_CIVIL',
		'CVE_GRADO_ESTUDIOS',
		'CVE_PARENTESCO',
		'CVE_ACT_CAMPO',
		'CVE_DOCUMENTO',
		'COP_FOT_IDEN_AD',
		'COP_FOT_IDEN_REV',
		'COP_FOT_COMPROBANTE',
		'COP_FOT_CURP',
		'COP_FOT_FUR',
		'COP_FOT_TARJETA',
		'COP_FOT_BENEFICIARIO',
		'CVE_ENTIDAD_FEDERATIVA',
		'DESC_ENTIDAD_FEDERATIVA',
		'CVE_MUNICIPIO',
		'DESC_MUNICIPIO',
		'CVE_LOCALIDAD',
		'DESC_LOCALIDAD',
		'LOC_TIPO',
		'CVE_REGION',
		'LOC_LATDEC',
		'LOC_LONGDEC',
		'CVE_ACTIVIDAD_LABORAL',
		'CALLE',
		'NUM_EXT',
		'NUM_INT',
		'MANZANA',
		'LOTE',
		'CODIGO_POSTAL',
		'ENTRE_CALLE',
		'OTRA_REFERENCIA',
		'TELEFONO',
		'NUMERO_HIJOS',
		'CORREO_ELECTRONICO',
		'IP_USER_C',
		'STATUS_1',
		'C_USER'
    ];

    public $timestamps = false;
     public $incrementing = false;

	 public function scopeIddPer($query, $periodo)
	 {
		 $periodo = strtoupper(Trim($periodo));
			  
		 if($periodo)
			 return $query->where('N_PERIODO', '=', "$periodo");             
	 }     
 
	 public function scopeIdTodo($query, $todo){
		 $todo = strtoupper(Trim($todo));          
		 if($todo)
			 return $query->where('NOMBRE_COMPLETO', 'LIKE', "%$todo%")
						 ->orwhere('CURP', 'LIKE', "%$todo%");   
	 }



}
