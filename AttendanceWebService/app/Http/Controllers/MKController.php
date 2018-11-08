<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MataKuliah;
use DB;

class MKController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $rows = MataKuliah::all();
        return view('MataKuliah.index', compact('rows'));
    }
    
    public function create() {
        return view('MataKuliah.create');
    }

    public function create_submit(Request $request) {
        MataKuliah::create([
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
        ]);
        return redirect()->action('MKController@index');
    }

    public function edit($id) {
        $data = MataKuliah::where('kode_mk', '=', $id)->firstOrFail();
        return view('MataKuliah.edit',compact('data'));
    }

    public function edit_submit(Request $request) {
        DB::table('mata_kuliahs')
            ->where('kode_mk', $request->kode_mk)
            ->update(array('nama_mk' => $request->nama_mk));
        return redirect()->action('MKController@index');
    }

    public function delete($id) {
        DB::table('mata_kuliahs')
            ->where('kode_mk', $id)->delete();
        return redirect()->action('MKController@index');
    }

    public function searching(Request $request)
    {
        $data = [];
        if ($request->has('q')) {
            $search = $request->q;

            $mata_kuliah=DB::table("mata_kuliahs")->where('nama_mk', 'LIKE', "%$search%")->get();
            foreach ($mata_kuliah as $mk) {
                $jadwal=DB::table("jadwals")->where("mk_kode",$mk->kode_mk)->get();
                if($jadwal!=null)
                {
                    foreach ($jadwal as $jdw) 
                    {
                        $jadwalbaru['kode_mk']=$mk->kode_mk;
                        $jadwalbaru['nama_mk']=$mk->nama_mk;
                        $jadwalbaru['id_jadwal']=$jdw->id;
                        $jadwalbaru['hari']=$jdw->hari;
                        array_push($data,$jadwalbaru);
                    }
                }
            }
        }
        return response()->json($data);
    }
}
