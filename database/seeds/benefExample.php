<?php

use Illuminate\Database\Seeder;

class benefExample extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::TABLE('FURWEB_METADATO_SEDGO2023')->INSERT([
            'N_PERIODO' => '2023',
            'CVE_PROGRAMA' => '512',
            'CVE_DEPENDENCIA' => '313139',
            'TIPO_BENEFICIARIO' => 'B',
            'PRIMER_APELLIDO' => 'MARTINEZ',
            'SEGUNDO_APELLIDO' => 'MILLAN',
            'NOMBRES' => 'BRUNO ESTEBAN',
            'NOMBRE_COMPLETO' => 'MARTINEZ MILLAN BRUNO ESTEBAN',
            'FECHA_NACIMIENTO' => '04/05/1999',
            'SEXO' => 'H',
            'CURP' => 'MAMB990504gfdg',
            'COP_FOT_IDEN_REV' => 'MAMB990504HMCRLR03_indenFotoRever.jpg',
            'COP_FOT_COMPROBANTE' => 'MAMB990504HMCRLR03_Comprobante_Es.jpg',
            'COP_FOT_CURP' => 'MAMB990504HMCRLR03_Curp.jpg',
            'COP_FOT_FUR' => 'MAMB990504HMCRLR03_DocFUR.jpg',
            'CVE_ENTIDAD_FEDERATIVA' => '15',
        ]);
    }
}
