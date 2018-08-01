<?php

use Illuminate\Database\Seeder;
use App\TanggalTraining;

class TanggalTrainingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TanggalTraining::create( [
        	'id_tanggal_training' => '1',
        	'tanggal_training' => '2018-07-19'
        ] );
        TanggalTraining::create( [
        	'id_tanggal_training' => '2',
        	'tanggal_training' => '2018-07-31'
        ] );

    }
}
