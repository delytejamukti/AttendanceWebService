<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $primarykey = 'kode_mk';
    protected $fillable = ['kode_mk', 'nama_mk'];
    protected $table = 'mata_kuliahs';

    
    public function jadwal(){
    	return $this->hasMany('App\Jadwal');
    }
}
