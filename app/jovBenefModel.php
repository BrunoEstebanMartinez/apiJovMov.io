<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jovBenefModel extends Model
{
   protected $table = "JOVMOVI_BENEF";
   protected $primaryKey = "ID_BENEF";
   protected $fillable = [
    'CURP_PER',
    'PATERNO_A',
    'MATERNO_A',
    'NOMBRES_PER',
    'GENERO_PER',
    'FECHANA_PER',
    'STAT_NAC',
    'STAT_BENEF',
    'STAT_EXIST',
    'STAT_NONAC'
   ];
   public $timestamps = false;

}




