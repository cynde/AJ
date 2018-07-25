<?php

namespace App\Http\Controllers;

use App\Pegawai;
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
        return view('pegawai.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $r = Pegawai::findorfail($id_pegawai);
        return view ('pegawai.edit',compact('r'));
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
        $r = Pegawai::findorfail($id_pegawai);
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
