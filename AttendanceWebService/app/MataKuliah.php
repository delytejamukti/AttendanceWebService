<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliahs';

    
    public function jadwal(){
    	return $this->hasMany('App\Jadwal');
    }
}
