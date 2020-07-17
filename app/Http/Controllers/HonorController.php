<?php

namespace App\Http\Controllers;

use App\Honor;
use Illuminate\Http\Request;

class HonorController extends Controller
{
    public function index(){
        $honor = Honor::all(); 
        return view('admin/honor/honor_v', ['honor' => $honor]);
    }

    public function add(){
        return view('admin/honor/add');
    }

    public function store(Request $request){
        $honor = new Honor;
        $honor->gapok = $request->gapok;
        $honor->tunjangan = $request->tunjangan;
        $honor->bidang_kerja = $request->bidang_kerja;
        $honor->save();
        return redirect('/honor')->with('status', 'Berhasil Menambah Data Honor');
    }

    public function edit($id_honor){
        $honor = Honor::find($id_honor);
        return view('admin/honor/update',  compact('honor'));
    }

    public function update(Request $request){
        $honor = Honor::find($request->id_honor);
        $honor->gapok = $request->gapok;
        $honor->tunjangan = $request->tunjangan;
        $honor->bidang_kerja = $request->bidang_kerja;
        $honor->save();
        return redirect('/honor')->with('status', 'Berhasil Merubah Data Honor');
    }

    public function delete(Request $request){
        Honor::where('id_honor',$request->id_honor)->delete();
        return redirect('/honor')->with('status', 'Berhasil Menghapus Data Honor');
    }
}
