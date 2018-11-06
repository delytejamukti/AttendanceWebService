<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliahs';
    protected $primarykey = 'kode_mk';
    protected $fillable = ['kode_mk', 'nama_mk'];
    public function jadwal(){
    	return $this->hasMany('App\Jadwal');
    }

}
