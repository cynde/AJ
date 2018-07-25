<?php

namespace App\Http\Controllers;

use App\Pegawai;
use App\Jabatan;
use App\Departemen;
use Illuminate\Http\Request;
use DB;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Pegawai::leftJoin('departemen', 'pegawai.id_departemen', '=', 'departemen.id_departemen')
        ->leftJoin('jabatan', 'pegawai.id_jabatan', '=', 'jabatan.id_jabatan')->get();
        // dd($all);
        return view('pegawai.index',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        $departemen = Departemen::all();
        return view('pegawai.tambah', compact('departemen','jabatan'));
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
            'nik_pegawai' => 'required|unique:pegawai',
            'nama_pegawai' => 'required',
            'id_departemen' => 'required',
            'id_jabatan' => 'required',
        ]);
        $new = new Pegawai();
        $new->nik_pegawai = $request->nik_pegawai;
        $new->nama_pegawai = $request->nama_pegawai;
        $new->id_departemen = $request->id_departemen;
        $new->id_jabatan = $request->id_jabatan;
        $new->save();
        return redirect()->route('pegawai');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nik_pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nik_pegawai)
    {
        $r = Pegawai::findorfail($nik_pegawai);
        $r = Pegawai::leftJoin('departemen', 'pegawai.id_departemen', '=', 'departemen.id_departemen')
                        ->leftJoin('jabatan', 'pegawai.id_jabatan', '=', 'jabatan.id_jabatan')
                        ->where('pegawai.nik_pegawai','=',$nik_pegawai)
                        ->first();
        $jabatan = Jabatan::all();
        $departemen = Departemen::all();
        return view ('pegawai.edit',compact('r','departemen','jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nik_pegawai)
    {
      $validatedData = $request->validate([
            'nik_pegawai' => 'required|unique:pegawai',
            'nama_pegawai' => 'required',
            'id_departemen' => 'required',
            'id_jabatan' => 'required',
        ]);
        $r = Pegawai::findorfail($nik_pegawai);
        $r->nik_pegawai = $request->nik_pegawai;
        $r->nama_pegawai = $request->nama_pegawai;
        $r->id_departemen = $request->id_departemen;
        $r->id_jabatan = $request->id_jabatan;
        $r->save();
        return redirect()->route('pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik_pegawai)
    {
        Pegawai::findorfail($nik_pegawai)->delete();
        return back();
    }
}
