<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

class jovBenefImagesModel extends Model{

  protected $table = "JOVMOVI_IMAGES";
  protected $primaryKey = "ID_IMAGE_P";
  protected $fillable = [
    'CURP_PER',
    'COMPROBANTE_ES',
    'CURP_PH',
    'ACTA_NAC',
    'IDENT_INE_REVER',
    'IDENT_INE_ADVER',
    'BENEF_FUR'
  ];

  public $timestamps = false;

}