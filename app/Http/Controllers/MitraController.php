<?php

namespace App\Http\Controllers;
use App\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function index(){
        $mitra = Mitra::all();
        return view('admin/mitra/mitra_v', ['mitra' => $mitra]);
    }

    public function add(){
        return view('admin/mitra/add');
    }

    public function store(Request $request){
        $mitra = new Mitra;
        $mitra->nama_mitra = $request->nama_mitra;
        $mitra->alamat = $request->alamat;
        $mitra->telp = $request->telp;
        $mitra->jenis_perusahaan = $request->jenis_perusahaan;
        $mitra->save();
        return redirect('/mitra')->with('status', 'Berhasil Menambah Data');
    }

    public function edit($id_mitra){
        $mitra = Mitra::find($id_mitra);
        return view('admin/mitra/update',  compact('mitra'));
    }

    public function update(Request $request){
        $mitra = Mitra::find($request->id_mitra);
        $mitra->nama_mitra = $request->nama_mitra;
        $mitra->alamat = $request->alamat;
        $mitra->telp = $request->telp;
        $mitra->jenis_perusahaan = $request->jenis_perusahaan;
        $mitra->save();
        return redirect('/mitra')->with('status', 'Berhasil Merubah Data');
    }

    public function delete(Request $request){
        Mitra::where('id_mitra',$request->id_mitra)->delete();
        return redirect('/mitra')->with('status', 'Berhasil Menghapus Data');
    }
}
