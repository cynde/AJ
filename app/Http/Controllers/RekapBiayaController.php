<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Training;
use App\Media;
use App\Penyelenggara;
use App\RekapitulasiTraining;
use App\Pegawai;
use App\TanggalRekapitulasi;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;


class RekapBiayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $rekapbiaya = DB::table('peserta_rekap_biaya')->get();

        return view('rekapBiaya', ['peserta_rekap_biaya' => $rekapbiaya], compact('rekapbiaya'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $all = RekapitulasiTraining::leftJoin('training','training.id_training','=','rekapitulasi_training.id_training')
        ->leftJoin('pegawai', 'pegawai.nik_pegawai', '=', 'rekapitulasi_training.nik_pegawai')
        ->leftJoin('tanggal_rekapitulasi', 'tanggal_rekapitulasi.id_rekapitulasi_training', '=', 'rekapitulasi_training.id_rekapitulasi_training')
        ->leftJoin('tanggal_training', 'tanggal_training.id_tanggal_training', '=', 'tanggal_rekapitulasi.id_tanggal_training')
        ->leftJoin('maxmin_tanggal_training','rekapitulasi_training.id_rekapitulasi_training','=','maxmin_tanggal_training.id_rekapitulasi_training')
        ->get();
        return response()->json([
           'success' => true,
           'data' => $all
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
