<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jovBenefModelSessions extends Model
{
    protected $table = "JOVMOVI_PINUNIQUE";
    protected $primaryKey = "ID_SEQ";
    protected $fillable = [
        'CURP_PER',
        'PIN_BENEF'
    ];
    public $timestamps = false;
}
