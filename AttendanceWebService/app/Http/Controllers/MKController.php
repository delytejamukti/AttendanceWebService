<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MataKuliah;

class MKController extends Controller
{
    public function home() {
        $rows = MataKuliah::all();
        return view('pages.matakuliah.home', compact('rows'));
    }
    
    public function create() {
        return view('pages.matakuliah.create');
    }

    public function create_submit(Request $request) {
        MataKuliah::create([
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
        ]);
        return redirect()->action('MKController@home');
    }

    public function edit($id) {
        $data = MataKuliah::where('kode_mk', '=', $id)->firstOrFail();
        return view('pages.matakuliah.edit',compact('data'));
    }

    public function edit_submit(Request $request) {
        MataKuliah::where('nama_mk', '=', $request->nama_mk)->firstOrFail()->update([
            'nama_mk' => $request->nama_mk,
        ]);
        return redirect()->action('MKController@home');
    }

    public function delete($id) {
        MataKuliah::where('kode_mk', '=', $id)->firstOrFail()->delete();
        return redirect()->action('MKController@home');
    }
}
