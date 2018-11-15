<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kehadiran;
use App\AmbilKuliah;
use Carbon\Carbon;

class KehadiranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kehadiran=Kehadiran::where("tanggal","<=",Carbon::now())->get();
    	return view('Kehadiran.index',compact('kehadiran'));
    }

    public function indexPrint()
    {
        $kehadiran=Kehadiran::where("tanggal","<=",Carbon::now())->get();
        return view('Kehadiran.print',compact('kehadiran'));
    }

    public function create(Request $request)
    {  
        $ambil=AmbilKuliah::where('jadwal_id',$request->mk)->get();
        
        foreach($ambil as $am)
        {
            $hadir=Kehadiran::where('ambil_mk_id',$am->id)->where(function($q)use($request){$q->where('pertemuan_ke',$request->pertemuan)->orwhere('tanggal',$request->tanggal);})->get();
            
            if(count($hadir)==0)
            {
                $hdr=new Kehadiran;
                $hdr->ambil_mk_id=$am->id;
                $hdr->tanggal=$request->tanggal;
                $hdr->hadir=0;
                $hdr->default=0;
                $hdr->catatan='';
                $hdr->pertemuan_ke=$request->pertemuan;
                $hdr->save();
            }
        }
    	return redirect('/kehadiran');
    }

    public function edit($id)
    {
        $kehadiran=Kehadiran::find($id);
        return view('Kehadiran.edit',compact('kehadiran'));
    }

    public function edit_submit(Request $request)
    {
        Kehadiran::whereId($request->id)->update([
            'catatan' => $request->catatan
        ]);
        return redirect()->action('KehadiranController@index');
    }

    public function kehadiran($id)
    {
    	$kehadiran=Kehadiran::find($id);
    	if($kehadiran!=null)
    	{
    		if($kehadiran->hadir==0)
    		{
    			$kehadiran->hadir=1;
    		}
    		else
    		{
    			$kehadiran->hadir=0;
    		}
    		$kehadiran->save();
    	}
    	return redirect('/kehadiran');
    }
}
