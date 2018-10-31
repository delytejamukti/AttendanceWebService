<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;
use App\MataKuliah;
use App\Jadwal;
use DB;

class JadwalController extends Controller
{
    public function index() {
        // $rows = Jadwal::all();
        $rows = DB::table('jadwals')
            ->select('*')
            ->join('dosens','nip','=','dosen_nip')
            ->join('mata_kuliahs','kode_mk','=','mk_kode')
            ->get();

        return view('jadwal.index', compact('rows'));
    }
    
    public function create() {
        $dosen = Dosen::pluck('nama_dosen', 'nip');
        $mata_kuliah = MataKuliah::pluck('nama_mk', 'kode_mk');

        return view('Jadwal.create', compact('dosen', 'mata_kuliah'));
    }

    public function create_submit(Request $request) {
        Jadwal::create([
            'dosen_nip' => $request->dosen_nip,
            'mk_kode' => $request->mk_kode,
            'hari' => $request->hari,
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);
        return redirect()->action('JadwalController@index');
    }

    public function edit($id) {
        $data = Jadwal::find($id);
        $dosen = Dosen::pluck('nama_dosen', 'nip');
        $mata_kuliah = MataKuliah::pluck('nama_mk', 'kode_mk');

        return view('Jadwal.edit',compact('data', 'dosen', 'mata_kuliah'));
    }

    public function edit_submit(Request $request) {
        Jadwal::whereId($request->id)->update([
            'dosen_nip' => $request->dosen_nip,
            'mk_kode' => $request->mk_kode,
            'hari' => $request->hari,
            'tahun_ajaran' => $request->tahun_ajaran,
        ]);
        return redirect()->action('JadwalController@index');
    }

    public function delete($id) {
        Jadwal::find($id)->delete();
        return redirect()->action('JadwalController@index');
    }
}
