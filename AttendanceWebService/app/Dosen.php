<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'jadwals';
    
    public function jadwal(){
    	return $this->hasMany('App\Jadwal');
    }
}
