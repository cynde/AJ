<?php

namespace App\Http\Controllers;

use App\RekapitulasiTraining;
use App\Training;
use App\Pegawai;
use Illuminate\Http\Request;

class RekapitulasiTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = RekapitulasiTraining::leftJoin('training','rekapitulasi_training.id_training','=','training.id_training')->leftJoin('pegawai', 'rekapitulasi_training.nik_pegawai', '=', 'pegawai.nik_pegawai')->leftJoin('departemen', 'pegawai.id_departemen','=','departemen.id_departemen')->leftJoin('divisi','departemen.id_divisi','=','divisi.id_divisi')->leftJoin('media','media.id_media','=','training.id_media')->leftJoin('topik','topik.id_topik','=','training.id_topik')->leftJoin('penyelenggara','penyelenggara.id_penyelenggara','=','training.id_penyelenggara')->leftJoin('kompetensi','kompetensi.id_kompetensi','=','training.id_kompetensi')->select('rekapitulasi_training.*','training.tanggal_training','training.nama_training','training.jumlah_jam_training','training.harga_training','training.invoice_training','pegawai.nama_pegawai','divisi.nama_divisi','media.nama_media','topik.nama_topik','penyelenggara.nama_penyelenggara','kompetensi.nama_kompetensi')->get();
        // dd($all);
        return view('rekapitulasiTraining.index', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = Pegawai::all();
        $training = Training::all();
        return view('rekapitulasiTraining.tambah',compact('pegawai','training'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lastRow = RekapitulasiTraining::orderBy('id_rekapitulasi_training', 'desc')->first();
        if(!$lastRow) {
            $id = 0;
        }
        else $id = $lastRow->id_rekapitulasi_training;
        $rt = new RekapitulasiTraining();
        $rt->id_training = $request->id_training;
        $rt->nik_pegawai = $request->nik_pegawai;
        $rt->justifikasi = $request->justifikasi;
        $rt->status_training = 'Diajukan';
        // dd($request->file('fpt_file'));
        if($request->file('fpt_file')){
            // fpt
            $dest_fpt = 'fpt/'.($id+1);
            $file_fpt = $request->file('fpt_file');
            $name_fpt = $file_fpt->getClientOriginalName();
            $path_fpt = $file_fpt->move($dest_fpt, $name_fpt);
            $rt->fpt_file = $path_fpt;
            $rt->status_training = 'FPT Disetujui';
        }
        if($request->file('pendaftaran_file')){
            // pendaftaran
            $dest_pendaftaran = 'pendaftaran/'.($id+1);
            $file_pendaftaran = $request->file('pendaftaran_file');
            $name_pendaftaran = $file_pendaftaran->getClientOriginalName();
            $path_pendaftaran = $file_pendaftaran->move($dest_pendaftaran, $name_pendaftaran);
            $rt->pendaftaran_file = $path_pendaftaran;
            $rt->status_training = 'Terdaftar';
        }
        if($request->file('undangan_file')){
            // undangan
            $dest_undangan = 'undangan/'.($id+1);
            $file_undangan = $request->file('undangan_file');
            $name_undangan = $file_undangan->getClientOriginalName();
            $path_undangan = $file_undangan->move($dest_undangan, $name_undangan);
            $rt->undangan_file = $path_undangan;
            $rt->status_training = 'Diundang';
        }
        if($request->file('absensi_file')){
            // absensi
            $dest_absensi = 'absensi/'.($id+1);
            $file_absensi = $request->file('absensi_file');
            $name_absensi = $file_absensi->getClientOriginalName();
            $path_absensi = $file_absensi->move($dest_absensi, $name_absensi);
            $rt->absensi_file = $path_absensi;
            $rt->status_training = 'Terlaksana';
        }
        if($request->file('sertifikat_file')){
            // sertifikat
            $dest_sertifikat = 'sertifikat/'.($id+1);
            $file_sertifikat = $request->file('sertifikat_file');
            $name_sertifikat = $file_sertifikat->getClientOriginalName();
            $path_sertifikat = $file_sertifikat->move($dest_sertifikat, $name_sertifikat);
            $rt->sertifikat_file = $path_sertifikat;
            $rt->status_training = 'Terlaksana';
        }
        if($request->file('invoice_file')){
            // invoice
            $dest_invoice = 'invoice/'.($id+1);
            $file_invoice = $request->file('invoice_file');
            $name_invoice = $file_invoice->getClientOriginalName();
            $path_invoice = $file_invoice->move($dest_invoice, $name_invoice);
            $rt->invoice_file = $path_invoice;
            $rt->status_training = 'Terlaksana';
        }
        if($request->file('eval_file')){
            // eval
            $dest_eval = 'eval/'.($id+1);
            $file_eval = $request->file('eval_file');
            $name_eval = $file_eval->getClientOriginalName();
            $path_eval = $file_eval->move($dest_eval, $name_eval);
            $rt->eval_file = $path_eval;
            $rt->status_training = 'Terlaksana';
        }
        $rt->biaya_lain = $request->biaya_lain;
        $rt->keterangan_lain = $request->keterangan_lain;
        // dd($rt);
        $rt->save();
        return redirect()->route('rekapitulasiTraining');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RekapitulasiTraining  $rekapitulasiTraining
     * @return \Illuminate\Http\Response
     */
    public function show(RekapitulasiTraining $rekapitulasiTraining)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RekapitulasiTraining  $rekapitulasiTraining
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $rt = RekapitulasiTraining::findorfail($id);
        $rt = RekapitulasiTraining::leftJoin('pegawai','pegawai.nik_pegawai','=','rekapitulasi_training.nik_pegawai')->leftJoin('training','training.id_training','=','rekapitulasi_training.id_training')->select('rekapitulasi_training.*','pegawai.nama_pegawai','pegawai.id_departemen','training.nama_training','training.tanggal_training')->where('rekapitulasi_training.id_rekapitulasi_training','=',$id)->first();
        $pegawai = Pegawai::all();
        $training = Training::all();
        return view('rekapitulasiTraining.edit', compact('rt','pegawai','training'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RekapitulasiTraining  $rekapitulasiTraining
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lastRow = RekapitulasiTraining::orderBy('id_rekapitulasi_training', 'desc')->first();
        if(!$lastRow) {
            $id = 0;
        }
        else $id = $lastRow->id_rekapitulasi_training;
        $rt = RekapitulasiTraining::findorfail($id);
        $rt->justifikasi = $request->justifikasi;
        // dd($request->file('fpt_file'));
        if(empty($rt->fpt_file) && $request->file('fpt_file')){
            // fpt
            $dest_fpt = 'fpt/'.($id+1);
            $file_fpt = $request->file('fpt_file');
            $name_fpt = $file_fpt->getClientOriginalName();
            $path_fpt = $file_fpt->move($dest_fpt, $name_fpt);
            $rt->fpt_file = $path_fpt;
            $rt->status_training = 'FPT Disetujui';
        }
        if(empty($rt->pendaftaran_file) && $request->file('pendaftaran_file')){
            // pendaftaran
            $dest_pendaftaran = 'pendaftaran/'.($id+1);
            $file_pendaftaran = $request->file('pendaftaran_file');
            $name_pendaftaran = $file_pendaftaran->getClientOriginalName();
            $path_pendaftaran = $file_pendaftaran->move($dest_pendaftaran, $name_pendaftaran);
            $rt->pendaftaran_file = $path_pendaftaran;
            $rt->status_training = 'Terdaftar';
        }
        if(empty($rt->undangan_file) && $request->file('undangan_file')){
            // undangan
            $dest_undangan = 'undangan/'.($id+1);
            $file_undangan = $request->file('undangan_file');
            $name_undangan = $file_undangan->getClientOriginalName();
            $path_undangan = $file_undangan->move($dest_undangan, $name_undangan);
            $rt->undangan_file = $path_undangan;
            $rt->status_training = 'Diundang';
        }
        if(empty($rt->absensi_file) && $request->file('absensi_file')){
            // absensi
            $dest_absensi = 'absensi/'.($id+1);
            $file_absensi = $request->file('absensi_file');
            $name_absensi = $file_absensi->getClientOriginalName();
            $path_absensi = $file_absensi->move($dest_absensi, $name_absensi);
            $rt->absensi_file = $path_absensi;
            $rt->status_training = 'Terlaksana';
        }
        if(empty($rt->sertifikat_file) && $request->file('sertifikat_file')){
            // sertifikat
            $dest_sertifikat = 'sertifikat/'.($id+1);
            $file_sertifikat = $request->file('sertifikat_file');
            $name_sertifikat = $file_sertifikat->getClientOriginalName();
            $path_sertifikat = $file_sertifikat->move($dest_sertifikat, $name_sertifikat);
            $rt->sertifikat_file = $path_sertifikat;
            $rt->status_training = 'Terlaksana';
        }
        if(empty($rt->invoice_file) && $request->file('invoice_file')){
            // invoice
            $dest_invoice = 'invoice/'.($id+1);
            $file_invoice = $request->file('invoice_file');
            $name_invoice = $file_invoice->getClientOriginalName();
            $path_invoice = $file_invoice->move($dest_invoice, $name_invoice);
            $rt->invoice_file = $path_invoice;
            $rt->status_training = 'Terlaksana';
        }
        if(empty($rt->eval_file) && $request->file('eval_file')){
            // eval
            $dest_eval = 'eval/'.($id+1);
            $file_eval = $request->file('eval_file');
            $name_eval = $file_eval->getClientOriginalName();
            $path_eval = $file_eval->move($dest_eval, $name_eval);
            $rt->eval_file = $path_eval;
            $rt->status_training = 'Terlaksana';
        }
        $rt->biaya_lain = $request->biaya_lain;
        $rt->keterangan_lain = $request->keterangan_lain;
        // dd($rt);
        $rt->save();
        return redirect()->route('rekapitulasiTraining');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RekapitulasiTraining  $rekapitulasiTraining
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RekapitulasiTraining::findorfail($id)->delete();
        return back();
    }
}
