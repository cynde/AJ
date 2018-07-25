<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    protected $table = 'departemen';
    protected $primaryKey = 'id_departemen';

  	protected $fillable = ['id_departemen','nama_departemen'];
    public $incrementing = false;
  	public function pegawai(){
    	return $this->belongsTo('App\Pegawai');
    }

  	public function kompetensi_departemen(){
    	return $this->belongsTo('App\KompetensiDepartemen');
    }

  	public function divisi(){
    	return $this->hasOne('App\Divisi');
    }
}
