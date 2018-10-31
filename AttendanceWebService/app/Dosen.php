<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    public function jadwal()
    {
        return $this->hasMany('App\Jadwal');
    }
}
