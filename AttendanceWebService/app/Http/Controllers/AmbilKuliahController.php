<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AmbilKuliahController extends Controller
{
    public function index(){
    	$data['j'] = DB::table('jadwals')
    				->join('dosens', 'dosen_nip', '=', 'nip')
    				->join('mata_kuliahs', 'kode_mk', '=', 'mk_kode')
    				->select('*')
    				->get();
    	$data['c'] = 1;
    	return view('/ambil_kuliah/index', $data);
    }

    public function peserta(){
    	$t = request('jadwal');
    	dd($t);
    }
}
