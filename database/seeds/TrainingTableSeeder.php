<?php

use Illuminate\Database\Seeder;
use App\Training;

class TrainingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Training::create( [
        'id_training'=>'01',
        'nama_training'=>'Customer Engagement',
        'tanggal_training'=>'2018-07-03',
        'time_start'=>'10:00:00',
        'time_finish'=>'15:00:00',
        'jumlah_jam_training'=>'5',
        'harga_training'=>'5000000',
        'invoice_training'=>'5000000',
        'id_media'=>'1',
        'id_topik'=>'K',
		'id_penyelenggara'=>'1',
		] );
    }
}
