<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catLocaLCodigos extends Model
{
    protected $table = "CAT_LOCALIDADES";
    protected $primaryKey = "CVE_ENTIDAD_FEDERATIVA";
    protected $fillable = [
    	'CVE_ENTIDAD_FEDERATIVA',
    	'CVE_MUNICIPIO',
        'DESC_LOCALIDAD',
        'D_CODIGO',

    ];
}
