<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jovBenefModelFUR extends Model
{
    protected $table = "FURWEB_METADATO_SR2022RESV1";
    protected $primaryKey = "FOLIO";
    protected $fillable = [
    	'N_PERIODO',
    	'FOLIO_RELACIONADO',
    	'PRIMER_APELLIDO',
    	'SEGUNDO_APELLIDO',
    	'NOMBRES',
    	'FECHA_NACIMIENTO',
    	'SEXO',
    	'CURP',
    	'CVE_ENTIDAD_FEDERATIVA',
    	'RED_SOCIAL',
    	'STATUS_1',
    	'STATUS_2',
    	'FECHA_REG',
		'IP'
    ];

    public $timestamps = false;
}
