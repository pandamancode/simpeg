<?php

namespace App\Http\Controllers;
use App\Penempatan;
use App\Mitra;
use App\Pegawai;
use Illuminate\Http\Request;

class PenempatanController extends Controller
{
    public function index(){
        //$mitra = Mitra::all();
        $penempatan = \DB::table('tb_penempatan')
        ->join('tb_pegawai', 'tb_penempatan.nik', '=', 'tb_pegawai.nik')
        ->join('tb_mitra', 'tb_penempatan.id_mitra', '=', 'tb_mitra.id_mitra')
        ->where('tb_penempatan.aktif', '=', 'true')
        ->select('tb_pegawai.*', 'tb_penempatan.status', 'tb_penempatan.id_penempatan', 'tb_mitra.id_mitra','tb_mitra.nama_mitra')
        ->get(); 
        return view('admin/penempatan/penempatan_v', ['penempatan' => $penempatan]);
    }

    public function add(){
        $pegawai = Pegawai::all();
        $mitra = Mitra::all();
        return view('admin/penempatan/add', ['pegawai' => $pegawai,'mitra' => $mitra]);
    }

    public function store(Request $request){
        $cek = \DB::table('tb_penempatan')->where('nik','=',$request->nik)->where('aktif','=','true')->count();
       // $count = mysql_num_rows($cek);
        if($cek > 0){
            return redirect('/penempatan')->with('warning', 'Data Pegawai Sudah Ada');
        }else{
            $penempatan = new Penempatan;
            $penempatan->nik = $request->nik;
            $penempatan->id_mitra = $request->id_mitra;
            $penempatan->status = $request->status;
            $penempatan->save();
            return redirect('/penempatan')->with('status', 'Berhasil Menambah Data');
        }
    }

    public function nonaktif(Request $request){
        $penempatan = Penempatan::find($request->id_penempatan);
        $penempatan->aktif = 'false';
        $penempatan->save();
        return redirect('/penempatan')->with('status', 'Berhasil Menon-aktifkan Data');
    }

    public function edit($id_penempatan){
        $pegawai = Pegawai::all();
        $mitra = Mitra::all();
        $penempatan = Penempatan::find($id_penempatan);
        return view('admin/penempatan/update',  compact('penempatan'), ['pegawai' => $pegawai,'mitra' => $mitra]);
    }

    public function update(Request $request){
        $penempatan = Penempatan::find($request->id_penempatan);
        $penempatan->nik = $request->nik;
        $penempatan->id_mitra = $request->id_mitra;
        $penempatan->status = $request->status;
        $penempatan->save();
        return redirect('/penempatan')->with('status', 'Berhasil Merubah Data');
    }

    public function delete(Request $request){
        Penempatan::where('id_penempatan',$request->id_penempatan)->delete();
        return redirect('/penempatan')->with('status', 'Berhasil Menghapus Data');
    }
}
