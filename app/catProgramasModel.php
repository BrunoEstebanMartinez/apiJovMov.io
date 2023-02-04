<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catProgramasModel extends Model
{
    protected $table = "CAT_PROGRAMAS_APP";
    protected $primaryKey = "CVE_PROGRAMA";
    protected $fillable = [
    	'CVE_PROGRAMA',
    	'CVE_DEPENDENCIA',
    	'DEPENDENCIA',
    	'PROGRAMA',
    	'VERTIENTE',
    	'PERIODO_ID'
    ];

}
