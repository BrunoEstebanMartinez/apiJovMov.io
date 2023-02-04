<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catEdosCvlModel extends Model
{
    protected $table = "CAT_ESTADO_CIVIL";
    protected $primaryKey = "CVE_ESTADO_CIVIL";
    protected $fillable = [
    	'CVE_ESTADO_CIVIL',
    	'ESTADO_CIVIL',
    ];
}
