<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RekapPeserta;
use App\Pegawai;
use DB;

class RekapPesertaController extends Controller
{
    public function index()
    {
    	$all = RekapPeserta::all();
    	$giat = 'Giat';
    	$juara = 'Juara';

    	$data = RekapPeserta::select(DB::raw('date_add(rekap_peserta.tanggal_akhir, INTERVAL -(DAYOFWEEK(rekap_peserta.tanggal_akhir)-2) day) as per_tanggal, week(tanggal_akhir) as minggu, sum(jumlah_jam) as jmlh_jam, count(nama_peserta) as jmlh_peserta, count(distinct nama_peserta) as jmlh_pegawai_training'))->groupBy('minggu')->orderBy('per_tanggal','asc')->get();
        $kegiatan = RekapPeserta::select(DB::raw('week(tanggal_akhir) as minggu, count(nama_training) as jmlh_kegiatan'))->groupBy('minggu','periode','nama_training')->get();
        // dd($kegiatan);
        $peserta_giat = DB::select(DB::raw("select a.minggu, count(nama_peserta) as jmlh_peserta_giat from (select DISTINCT week(tanggal_akhir) as minggu from rekap_peserta) a left outer join rekap_peserta b on a.minggu = week(b.tanggal_akhir) and media = 'Giat' group by minggu"));
        $peserta_juara = DB::select(DB::raw("select a.minggu, count(nama_peserta) as jmlh_peserta_juara from (select DISTINCT week(tanggal_akhir) as minggu from rekap_peserta) a left outer join rekap_peserta b on a.minggu = week(b.tanggal_akhir) and media = 'Juara' group by minggu"));
    	// $pegawai = Pegawai::select(DB::raw('week(tanggal_masuk) as minggu_masuk, count(nik_pegawai) as jmlh_pegawai'))->groupBy('minggu_masuk')->get();

        for ($i=0; $i < count($data); $i++) {
            $d = date($data[$i]->per_tanggal);
            $pegawai = DB::select(DB::raw("select count(nik_pegawai) as jmlh_pegawai from pegawai where tanggal_masuk <= '$d' and (tanggal_keluar is null or tanggal_keluar > '$d')"));
            // dd($data[$i]->per_tanggal);
            // dd($pegawai[0]->jmlh_pegawai);
            $jam_per_pegawai = round($data[$i]->jmlh_jam/$pegawai[0]->jmlh_pegawai,3);
            $hari_per_pegawai = round($jam_per_pegawai/8,3);
            $rekap[$i] = array(
                'per_tanggal' => $data[$i]->per_tanggal,
                'minggu' => $data[$i]->minggu,
                'jmlh_jam' => $data[$i]->jmlh_jam,
                'jmlh_peserta' => $data[$i]->jmlh_peserta,
                'jmlh_pegawai_training' => $data[$i]->jmlh_pegawai_training,
                'jmlh_kegiatan' => $kegiatan[$i]->jmlh_kegiatan,
                'jmlh_peserta_giat' => $peserta_giat[$i]->jmlh_peserta_giat,
                'jmlh_peserta_juara' => $peserta_juara[$i]->jmlh_peserta_juara,
                'total_pegawai' => $pegawai[0]->jmlh_pegawai,
                'jam_per_pegawai' => $jam_per_pegawai,
                'hari_per_pegawai' => $hari_per_pegawai
            );

        }
        // dd($rekap);
    	return view('rekapPeserta', compact('rekap'));
    }
}
