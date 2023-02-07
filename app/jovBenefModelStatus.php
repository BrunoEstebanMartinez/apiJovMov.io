<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jovBenefModelStatus extends Model
{
    protected $table = "JOVMOVI_IP";
    protected $primaryKey = "ID_BIT";
    protected $fillable = [
        'CURP_PH',
        'IP_BENEF',
    ];

    public $timestamps = false;
}
