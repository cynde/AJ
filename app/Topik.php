<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topik extends Model
{
    protected $table = 'topik';
    protected $primaryKey = 'id_topik';

  	protected $guarded = ['id_topik'];
  	
  	public function training(){
    	return $this->belongsTo('App\Training');
    }
}
