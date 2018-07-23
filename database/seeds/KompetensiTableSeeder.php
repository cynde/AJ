<?php

use Illuminate\Database\Seeder;
use App\Kompetensi;

class KompetensiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kompetensi::create( [
		'id_kompetensi'=>'01',
		'nama_kompetensi'=>'Finance'
		] );
        Kompetensi::create( [
		'id_kompetensi'=>'02',
		'nama_kompetensi'=>'Manajemen'
		] );
        Kompetensi::create( [
		'id_kompetensi'=>'03',
		'nama_kompetensi'=>'Teknologi'
		] );
        Kompetensi::create( [
		'id_kompetensi'=>'04',
		'nama_kompetensi'=>'Public Speaking'
		] );
    }
}
