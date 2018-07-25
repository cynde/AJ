<?php

namespace App\Http\Controllers;

use App\Jabatan;
use Illuminate\Http\Request;
use DB;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Jabatan::orderBy('nama_jabatan', 'ASC')->get();
        return view('jabatan.index',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jabatan.tambah');
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
            'id_jabatan' => 'required|unique:jabatan|max:50',
            'nama_jabatan' => 'required|unique:jabatan',
        ]);
        $new = new Jabatan();
        $new->id_jabatan = $request->id_jabatan;
        $new->nama_jabatan = $request->nama_jabatan;
        $new->save();
        return redirect()->route('jabatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_jabatan)
    {
        $r = Jabatan::findorfail($id_jabatan);
        return view ('jabatan.edit',compact('r'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_jabatan)
    {
        $r = Jabatan::findorfail($id_jabatan);
        $validatedData = $request->validate([
            'id_jabatan' => 'required|unique:jabatan',
            'nama_jabatan' => 'required|unique:jabatan',
        ]);
        $r->id_jabatan = $request->id_jabatan;
        $r->nama_jabatan = $request->nama_jabatan;
        $r->save();
        return redirect()->route('jabatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jabatan)
    {
        Jabatan::findorfail($id_jabatan)->delete();
        return back();
    }
}
