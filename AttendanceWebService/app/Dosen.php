<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosens';
    protected $fillable =['nama_dosen'];
    protected $primaryKey = 'nip';
    public $incrementing = false;
    
    public function jadwal(){
    	return $this->hasMany('App\Jadwal');
    }


}
