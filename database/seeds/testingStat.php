<?php

use Illuminate\Database\Seeder;

class testingStat extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('JOVMOVI_IP')->insert([
            'CURP_PH' => '2134VH',
            'IP_BENEF' => '192.172.23.2',
        ]);
    }
}
