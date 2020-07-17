<?php

namespace App\Http\Controllers;

use App\Gaji;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    public function index(){
        return view('admin/gaji/filter');
    }

    /*public function index(){
        $gaji = Gaji::all(); 
        return view('admin/gaji/gaji_v', ['gaji' => $gaji]);
    }*/

    public function filter(Request $request){
        $gaji = \DB::table('tb_penggajian')
        ->join('tb_pegawai', 'tb_penggajian.nik', '=', 'tb_pegawai.nik')
        ->where('tb_penggajian.bulan', '=', $request->bulan)
        ->where('tb_penggajian.tahun', '=', $request->tahun)
        ->select('tb_pegawai.*', 'tb_penggajian.*')
        ->get(); 
        session(['bulan' => $request->bulan, 'tahun'=>$request->tahun]);
        return view('admin/gaji/data',['gaji'=>$gaji]);
    }

    public function add(Request $request){
        $pegawai = \DB::table('tb_penempatan')
        ->join('tb_pegawai', 'tb_penempatan.nik', '=', 'tb_pegawai.nik')
        ->where('tb_penempatan.aktif', '=', 'true')
        ->select('tb_pegawai.*', 'tb_penempatan.status', 'tb_penempatan.id_penempatan')
        ->get(); 

        echo show_my_modal('admin/gaji/modal_add','md-add',['id'=>$request->id, 'pegawai'=>$pegawai]);
    }

    public function data_gaji(Request $request){
        $gaji = \DB::table('tb_honor')
        ->join('tb_pegawai', 'tb_honor.bidang_kerja', '=', 'tb_pegawai.bidang_kerja')
        ->where('tb_pegawai.nik', '=', $request->pegawai)
        ->select('tb_honor.*')
        ->get(); 

        $penempatan = \DB::table('tb_pegawai')
        ->join('tb_penempatan', 'tb_pegawai.nik', '=', 'tb_penempatan.nik')
        ->where('tb_pegawai.nik', '=', $request->pegawai)
        ->where('tb_penempatan.aktif', '=', 'true')
        ->select('tb_penempatan.status')
        ->get(); 

        return view('admin/gaji/data_gaji',['gaji'=>$gaji, 'penempatan'=>$penempatan]);
    }

    public function store(Request $request){
        $cek = \DB::table('tb_penggajian')->where('nik','=',$request->pegawai)->where('bulan','=',session('bulan'))->where('tahun','=',session('tahun'))->count();
        if($cek > 0){
            echo "warning";
        }else{
            $gaji = new Gaji;
            $gaji->nik = $request->pegawai;
            $gaji->gapok = $request->gapok;
            $gaji->tunjangan = $request->tunjangan;
            $gaji->potongan = $request->potongan;
            $gaji->total_gaji = $request->total_gaji;
            $gaji->bulan = session('bulan');
            $gaji->tahun = session('tahun');
            $gaji->save();
            echo "success";
        }
        //return redirect('/gaji')->with('status', 'Berhasil Menginput Data Gaji');
    }
}
