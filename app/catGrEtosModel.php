<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catGrEtosModel extends Model
{
    protected $table = "CAT_GRADO_ESTUDIO";
    protected $primaryKey = "CVE_GRADO_ESTUDIOS";
    protected $fillable = [
    	'CVE_GRADO_ESTUDIOS',
    	'GRADO_ESTUDIOS',
    ];
}
