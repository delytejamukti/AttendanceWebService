<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;

class JadwalController extends Controller
{
    public function home() {
        $rows = Jadwal::all();
        return view('pages.jadwal.home', compact('rows'));
    }
}
