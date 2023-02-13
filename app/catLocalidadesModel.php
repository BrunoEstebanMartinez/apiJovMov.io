<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catLocalidadesModel extends Model
{
    protected $table = "LU_LOCALIDADES";
    protected $primaryKey = "CVE_ENTIDAD_FEDERATIVA";
    protected $fillable = [
    	'CVE_ENTIDAD_FEDERATIVA',
    	'CVE_MUNICIPIO',
        'CVE_LOCALIDAD',
        'DESC_LOCALIDAD',
        'LOC_TIPO',
        'LOC_LATITUD',
        'LOC_LONGITUD',
        'LOC_LATDEC',
        'LOC_LONGDEC'
    ];
}
