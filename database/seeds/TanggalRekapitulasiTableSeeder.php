<?php

use Illuminate\Database\Seeder;
use App\TanggalRekapitulasi;

class TanggalRekapitulasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TanggalRekapitulasi::create( [
        	'id_rekapitulasi_training' => '1',
        	'id_tanggal_training' => '1'
        ] );
        TanggalRekapitulasi::create( [
        	'id_rekapitulasi_training' => '1',
        	'id_tanggal_training' => '2'
        ] );
    }
}
