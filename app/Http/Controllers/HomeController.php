<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\Mitra;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pegawai = Pegawai::all()->count();
        $mitra = Mitra::all()->count();
        $penempatan = \DB::table('tb_penempatan')->where('aktif', '=', 'true')->get()->count();
        return view('admin/home/home',['pegawai'=>$pegawai, 'mitra'=>$mitra, 'penempatan'=>$penempatan]);
    }

    public function ubahpw(){
        return view('admin/ubah_pw');
    }

    public function changepw(Request $request){
        $this-> validate($request, [
            'id' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        $user = User::find($request->id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/ubahpw')->with('status', 'Berhasil Merubah Password');
    }
}
