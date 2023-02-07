<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TestingConn extends Seeder
{
   
    public function run()
    {
        DB::table('JOVMOVI_BENEF')->insert([
            'CURP_PER' => '2134VH',
            'PATERNO_A' => 'Martinez',
            'MATERNO_A' => 'Millan',
            'NOMBRES_PER' => 'Bruno',
            'GENERO_PER' => 'BM100',
            'FECHANA_PER' => 'FE200',
            'STAT_NAC' => 'mexico',
            'STAT_BENEF' => '1',
            'STAT_EXIST' => '1',
            'STAT_NONAC' => '1',
        ]);


       
    
    }
}
