<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KompetensiJabatan extends Model
{
    protected $table = 'kompetensi_jabatan';
    protected $primaryKey = 'id_kompetensi_jabatan';

  	protected $guarded = ['id_kompetensi_jabatan','id_kompetensi','id_jabatan'];

  	public function jabatan(){
    	return $this->hasOne('App\Jabatan');
    }

    public function kompetensi(){
    	return $this->hasOne('App\Kompetensi');
    }
}
