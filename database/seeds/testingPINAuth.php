<?php

use Illuminate\Database\Seeder;

class testingPINAuth extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('JOVMOVI_PINUNIQUE')->insert([
            'CURP_PER' => '2134VH',
            'PIN_BENEF' => '1234'
        ]);
    }
}
