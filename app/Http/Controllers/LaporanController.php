<?php

namespace App\Http\Controllers;

use App\Mitra;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(){
        $mitra = Mitra::all();
        return view('admin/laporan/laporan_v', ['mitra' => $mitra]);
    }
}
