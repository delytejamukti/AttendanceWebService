<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kehadiran;
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

    public function create(Request $request)
    {

    	return back();
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
