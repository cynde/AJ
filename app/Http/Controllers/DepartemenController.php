<?php

namespace App\Http\Controllers;

use App\Departemen;
use App\KompetensiDepartemen;
use App\Kompetensi;
use App\Divisi;
use DB;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Departemen::orderBy('id_departemen')->get();
        // dd($all);
        return view('departemen.index', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisi = Divisi::all();
        return view('departemen.tambah', compact('divisi'));
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
            'id_departemen' => 'required|unique:departemen',
            'nama_departemen' => 'required|unique:departemen',
            'id_divisi' => 'required',
        ]);
        $dept = new Departemen();
        $dept->id_departemen = $request->id_departemen;;
        $dept->nama_departemen = $request->nama_departemen;
        $dept->id_divisi = $request->id_divisi;
        $dept->save();
        return redirect()->route('departemen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $all = KompetensiDepartemen::where('id_departemen','=',$id)->leftJoin('kompetensi','kompetensi.id_kompetensi','=','kompetensi_departemen.id_kompetensi')->get();
        // $all = KompetensiDepartemen::where('id_departemen','=',$id)->leftJoin('kompetensi','kompetensi.id_kompetensi','=','kompetensi_departemen.id_kompetensi')->leftJoin('kompetensi','kompetensi.kompetensi_id','=','kompetensi_departemen.kompetensi_pendahulu')->get();
        // dd($all);
        return view('departemen.kompetensi', compact('all'));
    }

    public function addKompetensi(Request $request)
    {
        $kd = new KompetensiDepartemen();
        $kd->id_kompetensi = $request->id_kompetensi;
        $kd->level_kompetensi = $request->level_kompetensi;
        $kd->kompetensi_pendahulu = $request->kompetensi_pendahulu;
        $kd->save();
        return response()->json($kd);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $divisi = Divisi::all();
        $dept = Departemen::findorfail($id);
        return view('departemen.edit', compact('dept','divisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id_departemen' => 'required',
            'nama_departemen' => 'required',
            'id_divisi' => 'required',
        ]);
        $dept = Departemen::findorfail($id);
        $dept->id_departemen = $request->id_departemen;
        $dept->nama_departemen = $request->nama_departemen;
        $dept->id_divisi = $request->id_divisi;
        $dept->save();
        return redirect()->route('departemen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Departemen  $departemen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Departemen::findorfail($id)->delete();
        return back();
    }
}
