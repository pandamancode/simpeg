<?php

namespace App\Http\Controllers;
use App\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DatapegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $pegawai = Pegawai::all();
        return view('admin/pegawai/pegawai_v', ['pegawai' => $pegawai]);
    }

    public function add(){
        return view('admin/pegawai/add');
    }

    public function store(Request $request){
        $gambar = $request->foto;
        $new_gambar = $request->nik.'.'.$gambar->getClientOriginalExtension();

        $pegawai = new Pegawai;
        $pegawai->nik = $request->nik;
        $pegawai->nama_pegawai = $request->nama;
        $pegawai->jk = $request->jk;
        $pegawai->tempat_lahir = $request->tempat_lahir;
        $pegawai->tanggal_lahir = date('Y-m-d',strtotime($request->tanggal_lahir));
        $pegawai->alamat = $request->alamat;
        $pegawai->no_telp = $request->telp;
        $pegawai->bidang_kerja = $request->bidang_kerja;
        $pegawai->foto = 'images/'.$new_gambar;
        $pegawai->save();
        $gambar->move('images/',$new_gambar);
        return redirect('/pegawai')->with('status', 'Berhasil Menambah Data');
    }

    public function edit($nik){
        $pegawai = Pegawai::find($nik);
        return view('admin/pegawai/update',  compact('pegawai'));
    }

    public function update(Request $request){
        if($request->has('foto')){
            $gambar = $request->foto;
            $new_gambar = $request->nik.'.'.$gambar->getClientOriginalExtension();

            $pegawai = Pegawai::find($request->nik);
            $pegawai->nama_pegawai = $request->nama;
            $pegawai->jk = $request->jk;
            $pegawai->tempat_lahir = $request->tempat_lahir;
            $pegawai->tanggal_lahir = date('Y-m-d',strtotime($request->tanggal_lahir));
            $pegawai->alamat = $request->alamat;
            $pegawai->no_telp = $request->telp;
            $pegawai->bidang_kerja = $request->bidang_kerja;
            $pegawai->foto = 'images/'.$new_gambar;
            $pegawai->save();

            $gambar->move('images/',$new_gambar);
        }else{
            $pegawai = Pegawai::find($request->nik);
            $pegawai->nama_pegawai = $request->nama;
            $pegawai->jk = $request->jk;
            $pegawai->tempat_lahir = $request->tempat_lahir;
            $pegawai->tanggal_lahir = date('Y-m-d',strtotime($request->tanggal_lahir));
            $pegawai->alamat = $request->alamat;
            $pegawai->no_telp = $request->telp;
            $pegawai->bidang_kerja = $request->bidang_kerja;
            $pegawai->save();
        }
        return redirect('/pegawai')->with('status', 'Berhasil Merubah Data');
    }

    public function delete(Request $request){
        Pegawai::where('nik',$request->nik)->delete();
        return redirect('/pegawai')->with('status', 'Berhasil Menghapus Data');
    }

}
