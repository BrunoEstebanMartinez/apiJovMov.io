<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catAllCveAndDescModel extends Model
{
    protected $table = "IM_LOCALIDADES";
    protected $primaryKey = "CVE_LOC";
    protected $fillable = [
    	'CVE_LOC',
    	'CVE_ENTIDAD_FEDERATIVA',
        'ENTIDAD_FEDERATIVA',
        'CVE_MUNICIPIO',
        'MUNICIPIO',
        'LOC',
        'NOM_LOC',
        'LONGITUD',
        'LATITUD',
        'ALTITUD'
    ];
}
