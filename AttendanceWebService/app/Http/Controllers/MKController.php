<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MataKuliah;

class MKController extends Controller
{
    public function home() {
        $rows = MataKuliah::all();
        return view('matakuliah.home', compact('rows'));
    }
}
