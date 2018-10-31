<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwals';


    public function matakuliah(){
    	return $this->belongsTo('App\MataKuliah');
    }

    public function dosen(){
    	return $this->belongsTo('App\Dosen');
    }
}
