<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    public function dosen()
    {
        return $this->belongsTo('App\Dosen');
    }

    public function mata_kuliah()
    {
        return $this->belongsTo('App\MataKuliah');
    }

    protected $fillable = ['dosen_nip', 'mk_kode', 'hari', 'tahun_ajaran'];
}
