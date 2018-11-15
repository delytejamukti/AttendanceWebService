<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Imports\MahasiswaImport;
use Excel;



class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
    	return view('mahasiswa.create');
    }

    public function read()
    {
        $mhs = Mahasiswa::all();
    	return view ('mahasiswa.index', compact('mhs'));
    }

    public function import(Request $request) 
    {
        //dd(Excel::import(new MahasiswaImport, 'Mahasiswa.xlsx');
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file'); //GET FILE
            Excel::import(new MahasiswaImport, $file); //IMPORT FILE 
            return redirect('/mahasiswa')->with('success', 'All good!');
        }  
        //Excel::import(new MahasiswaImport, request()->file('file'));
        return redirect('/')->with('success', 'All good!');

        // if($request->hasFile('file')){
        //     $path = $request->file('file')->getRealPath();
        //     //$data = Excel::load($path, function($reader){})->get();
        //     if(!empty($data) && $data->count()){
        //         foreach($data as $key=>$val){
        //            $mahasiswa = new Mahasiswa;
        //            $mahasiswa->nrp = $val->nrp;
        //            $mahasiswa->nama_mhs = $val->nama_mhs;
        //            $mahasiswa->angkatan = $val->angkatan;
        //            $mahasiswa->save();
        //         }
        //     }
        // }
        //return back();
    }
    
    public function update(Request $request, $nrp)
    {
        $mahasiswa = Mahasiswa::find($nrp);
        $mahasiswa->nama_mhs = $request->nama_mhs;
        $mahasiswa->angkatan = (int)$request->angkatan;

        if ($mahasiswa->save())
        {
            return redirect('/mahasiswa')-> with('sukses', 'Data mahasiswa Berhasil disimpan');
        }
        else
        {
            return redirect('/mahasiswa/'.$nrp.'/edit')->withErrors(['Data mahasiswa Gagal disimpan'])->withInput();
        }
    }

    public function edit($mhs)
    {
    	$data['mahasiswa'] = Mahasiswa::find($mhs);
        return view('mahasiswa.edit', $data);
    }

    public function store(Request $request)
    {
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nrp = $request->nrp;
        $mahasiswa->nama_mhs = $request->nama_mhs;
        $mahasiswa->angkatan = (int)$request->angkatan;
        $mahasiswa->save();

        return redirect('/mahasiswa');

    }

    public function destroy($nrp)
    {
        $mahasiswa = Mahasiswa::find($nrp);
        if(!$mahasiswa) {
            return abort(404);
        }
        $mahasiswa->delete();
        return redirect('/mahasiswa') -> with('sukses', 'Data Mahasiswa berhasil di hapus :)');
    }

    public function search(Request $request)
    {
        $data = [];
        if ($request->has('q')) {
            $search = $request->q;

            $data=Mahasiswa::where('nama_mhs', 'LIKE', "%$search%")->get();
        }
        return response()->json($data);
    }

}
