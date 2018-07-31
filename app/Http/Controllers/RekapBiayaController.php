<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Training;
use App\Media;
use App\Penyelenggara;
use App\RekapitulasiTraining;
use App\Pegawai;
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
        $all = Training::leftJoin('media', 'training.id_media', '=', 'media.id_media')
                        ->leftJoin('penyelenggara', 'training.id_penyelenggara', '=', 'penyelenggara.id_penyelenggara')
                        ->leftJoin('rekapitulasi_training', 'rekapitulasi_training.id_training', '=', 'training.id_training')
                        ->get();
        return view('rekapBiaya', compact('all'));

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
        $all = RekapitulasiTraining::leftJoin('training','training.id_training','=','rekapitulasi_training.id_training')->where('rekapitulasi_training.id_training','=',$id)->get();
        // console.log($all);
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
