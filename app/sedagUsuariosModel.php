<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sedagUsuariosModel extends Model
{
    protected $table = "CTRL_ACCESO_APP_SED";
    protected $primaryKey = ['FOLIO'];
    protected $fillable = [
    	'N_PERIODO',
    	'FOLIO',
    	'FOLIO_RELACIONADO',
    	'CVE_PROGRAMA',
        'OTR_PROGRAMA',
    	'CVE_DEPENDENCIA',
    	'CVE_COORDINACION',
    	'CVE_UADMON',
    	'CVE_SERVIDOR',
    	'PRIMER_APELLIDO',
    	'SEGUNDO_APELLIDO',
    	'NOMBRES',
    	'NOMBRE_COMPLETO',
    	'FECHA_NAC',
    	'CURP',
    	'FECHA_REG',
    	'PERIODO_ID_REG',
    	'MES_ID_REG',
    	'DIA_ID_REG',
    	'SEXO',
    	'RFC',
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
    	'ENTRE_CALLE',
    	'Y_CALLE',
    	'OTRA_REFERENCIA',
    	'TELEFONO_REF',
    	'CELULAR',
    	'E_MAIL_PERSONAL',
    	'E_MAIL_GOB',
    	'EDO_CIVIL_ID',
    	'GRADO_ESTUDIOS_ID',
    	'PUESTO',
    	'OBS_1',
    	'OBS_2',
    	'IP',
    	'LOGIN',
    	'PASSLOG',
    	'CVE_USUARIO',
    	'CVE_ARBOL',
    	'STATUS_1'
    ];

    public $timestamps = false;
     public $incrementing = false;

}
