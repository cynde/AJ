<?php

use Illuminate\Database\Seeder;
use App\RekapitulasiTraining;

class RekapitulasiTrainingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	RekapitulasiTraining::create( [
        'id_rekapitulasi_training'=>'1',
        'nik_pegawai'=>'0614887',
        'status_training'=>'Diajukan',
        'justifikasi'=>'TNA',
        'jumlah_jam_training'=>'5',
        'fpt_file'=>'',
        'pendaftaran_file'=>'',
        'undangan_file'=>'',
        'absensi_file'=>'',
        'sertifikat_file'=>'',
        'eval_file'=>'',
        'invoice_file'=>'',
        'biaya_lain'=>'500000',
        'keterangan_lain'=>'biaya lain untuk transport',
        'id_training'=>'01'
    	]);
    }
}
