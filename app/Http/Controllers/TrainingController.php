<?php

namespace App\Http\Controllers;

use App\Training;
use App\Media;
use App\Topik;
use App\Penyelenggara;
use App\Kompetensi;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Training::leftJoin('media', 'training.id_media', '=', 'media.id_media')
                        ->leftJoin('topik', 'training.id_topik', '=', 'topik.id_topik')
                        ->leftJoin('penyelenggara', 'training.id_penyelenggara', '=', 'penyelenggara.id_penyelenggara')
                        ->leftJoin('Kompetensi','training.id_kompetensi','=','kompetensi.id_kompetensi')
                        ->get();
        return view('training.index', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $media = Media::all();
        $topik = Topik::all();
        $penyelenggara = Penyelenggara::all();
        $kompetensi = Kompetensi::all();
        return view('training.tambah', compact('media','topik','penyelenggara', 'kompetensi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_training' => 'required|unique:training',
            'tanggal_training' => 'required',
            'nama_training' => 'required',
            'time_start' => 'required',
            'time_finish' => 'required',
            'id_media' => 'required',
            'id_topik' => 'required',
            'id_kompetensi' => 'required',
            'id_penyelenggara' => 'required',
            'harga_training' => 'required|numeric',
            'invoice_training' => 'required|numeric',
        ]);
        $train = new Training();
        $train->id_training = $request->id_training;
        $train->tanggal_training = $request->tanggal_training;
        $train->nama_training = $request->nama_training;
        $train->time_start = $request->time_start;
        $train->time_finish = $request->time_finish;
        $train->jumlah_jam_training = (int)$request->time_finish - (int)$request->time_start;
        $train->id_media = $request->id_media;
        $train->id_topik = $request->id_topik;
        $train->id_kompetensi = $request->id_kompetensi;
        $train->id_penyelenggara = $request->id_penyelenggara;
        $train->harga_training = $request->harga_training;
        $train->invoice_training = $request->invoice_training;
        $train->save();
        return redirect()->route('training');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $train = Training::leftJoin('media', 'training.id_media', '=', 'media.id_media')
                        ->leftJoin('topik', 'training.id_topik', '=', 'topik.id_topik')
                        ->leftJoin('penyelenggara', 'training.id_penyelenggara', '=', 'penyelenggara.id_penyelenggara')
                        ->leftJoin('Kompetensi','training.id_kompetensi','=','kompetensi.id_kompetensi')
                        ->where('training.id_training','=',$id)
                        ->first();
        $media = Media::all();
        $topik = Topik::all();
        $penyelenggara = Penyelenggara::all();
        $kompetensi = Kompetensi::all();
        return view('training.edit', compact('train','media','topik','penyelenggara','kompetensi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_training' => 'required',
            'tanggal_training' => 'required',
            'nama_training' => 'required',
            'time_start' => 'required',
            'time_finish' => 'required',
            'id_media' => 'required',
            'id_topik' => 'required',
            'id_kompetensi' => 'required',
            'id_penyelenggara' => 'required',
            'harga_training' => 'required|numeric',
            'invoice_training' => 'required|numeric',
        ]);
        $train = Training::findorfail($id);
        $train->id_training = $request->id_training;
        $train->tanggal_training = $request->tanggal_training;
        $train->nama_training = $request->nama_training;
        $train->time_start = $request->time_start;
        $train->time_finish = $request->time_finish;
        $train->jumlah_jam_training = (int)$request->time_finish - (int)$request->time_start;
        $train->id_media = $request->id_media;
        $train->id_topik = $request->id_topik;
        $train->id_kompetensi = $request->id_kompetensi;
        $train->id_penyelenggara = $request->id_penyelenggara;
        $train->harga_training = $request->harga_training;
        $train->invoice_training = $request->invoice_training;
        $train->save();
        return redirect()->route('training');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Training::findorfail($id)->delete();
        return back();
    }
}
