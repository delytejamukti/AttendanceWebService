<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dosen;

class DosenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function read()
    {
    	$dosen = Dosen::all();
    	return view('dosen.index', compact('dosen'));

    }

     public function create()
     {
     	return view('dosen.create');
     }

     public function store(Request $request)
     {
     	$dosen = new Dosen; 	
     	$dosen->nip = $request->nip;
     	$dosen->nama_dosen = $request->nama_dosen;
     	$dosen->save();

     	return redirect('/dosen');

     }

     public function edit($nip)
     {
     	$data['dosen'] = Dosen::find($nip);
     	return view('dosen.edit', $data);
     }

     public function update(Request $request, $nip)
     {

        $dosen = Dosen::find($nip);
        $dosen->nama_dosen = $request->nama_dosen;

        if ($dosen->save()) {

        	return redirect('/dosen')-> with('sukses', 'Data Dosen berhasil disimpan');
        }
        else {
        	return redirect('/dosen'.$nip.'/edit')->withErrors(['Data Dosen gagal disimpan'])->withInput();
        
        }
     }

     public function destroy($nip)
    {
        $dosen = dosen::find($nip);
        if(!$dosen) {
            return abort(404);
        }
        $dosen->delete();
        return redirect('/dosen') -> with('sukses', 'Data dosen berhasil di hapus :)');
    }
}
