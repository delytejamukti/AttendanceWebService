<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    public function jadwal()
    {
        return $this->hasMany('App\Jadwal');
    }
    
    protected $primarykey = 'kode_mk';
    protected $fillable = ['kode_mk', 'nama_mk'];
}
