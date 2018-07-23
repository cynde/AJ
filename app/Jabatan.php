<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    protected $primaryKey = 'id_jabatan';

  	protected $guarded = ['id_jabatan'];

  	public function pegawai(){
    	return $this->belongsTo('App\Pegawai');
    }

    public function kompetensi_jabatan(){
    	return $this->belongsTo('App\KompetensiJabatan');
    }
}
