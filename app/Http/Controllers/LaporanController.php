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

    public function perbidang(Request $request){
        $perbidang = \DB::table('tb_penempatan')
        ->join('tb_pegawai', 'tb_penempatan.nik', '=', 'tb_pegawai.nik')
        ->join('tb_mitra', 'tb_penempatan.id_mitra', '=', 'tb_mitra.id_mitra')
        ->where('tb_penempatan.aktif', '=', 'true')
        ->where('tb_pegawai.bidang_kerja', '=', $request->bidang_kerja)
        ->select('tb_pegawai.*', 'tb_penempatan.status', 'tb_penempatan.id_penempatan', 'tb_mitra.id_mitra', 'tb_mitra.nama_mitra')
        ->get(); 

        $hrd =  \DB::table('users')
        ->where('level', '=', 'HRD')
        ->select('users.*')
        ->get();

        return view('admin/laporan/perbidang_pdf', ['perbidang' => $perbidang, 'hrd'=>$hrd]);
    }

    public function perpenempatan(Request $request){
        $penempatan = \DB::table('tb_penempatan')
        ->join('tb_pegawai', 'tb_penempatan.nik', '=', 'tb_pegawai.nik')
        ->join('tb_mitra', 'tb_penempatan.id_mitra', '=', 'tb_mitra.id_mitra')
        ->where('tb_penempatan.aktif', '=', 'true')
        ->where('tb_penempatan.id_mitra', '=', $request->mitra)
        ->select('tb_pegawai.*', 'tb_penempatan.status', 'tb_penempatan.id_penempatan', 'tb_mitra.id_mitra','tb_mitra.nama_mitra')
        ->get(); 
       
        $hrd =  \DB::table('users')
        ->where('level', '=', 'HRD')
        ->select('users.*')
        ->get();

        return view('admin/laporan/perpenempatan_pdf', ['penempatan' => $penempatan, 'hrd'=>$hrd]);
    }
}
