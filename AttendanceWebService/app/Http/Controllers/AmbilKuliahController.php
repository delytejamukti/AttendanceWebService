<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AmbilKuliah;
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
    	$data['jadwal'] = request('jadwal');
    	$data['nama_mk'] = request('nama_mk');
    	$data['ambil'] = DB::table('ambil_kuliahs')
    				->select('*')
    				->where('jadwal_id', '=', $data['jadwal'])
    				->join('mahasiswas', 'mahasiswas.nrp', '=', 'ambil_kuliahs.nrp')
    				->get();
    	$data['c'] = 1;
    	return view('/ambil_kuliah/peserta_index', $data);	
    }

    public function angkatan(){
    	$data['angkatan'] = request('angkatan');
    	$data['jadwal'] = request('jadwal');
    	$ambil = DB::table('ambil_kuliahs')
    				->select('nrp')
    				->where('jadwal_id', '=', $data['jadwal'])
    				->get();
    	$data['nrp'] = array();
    	$c = 0;
    	foreach($ambil as $a){
    		$data['nrp'][$c++] = $a->nrp;
    	}
    	$data['mhs'] = DB::table('mahasiswas')
    				->select('*')
    				->where('angkatan', '=', $data['angkatan'])
    				->whereNotIn('nrp', $data['nrp'])
    				->get();    	
    	$data['c'] = 1;
    	return view('/ambil_kuliah/peserta_angkatan', $data);
    }

    public function tambah(){
    	$ambil = new AmbilKuliah;
    	$ambil->nrp = request('mhs_nrp');
    	$ambil->jadwal_id = request('jadwal');
    	$ambil->save();
    	return redirect()->action('AmbilKuliahController@index');
    }

    public function delete(){
    	$ambil = AmbilKuliah::find(request('id'));
    	$ambil->delete();
    	return redirect()->action('AmbilKuliahController@index');
    }
}
