<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $user = User::all();
        return view('admin/user/user', ['user' => $user]);
    }

    public function register(){
        return view('admin/user/register');
    }

    public function store(Request $request){
        $this-> validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'level' => ['required', 'string'],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();
        return redirect('/users')->with('status', 'Berhasil Menambah Data Pengguna');
    }

    public function edit($id){
        $user = User::find($id);
        return view('admin/user/update',  compact('user'));
    }

    public function update(Request $request){
        $this-> validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'level' => ['required', 'string'],
        ]);
        
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();
        return redirect('/users')->with('status', 'Berhasil Merubah Data Pengguna');
    }

    public function delete(Request $request){
        User::where('id',$request->id)->delete();
        return redirect('/users')->with('status', 'Berhasil Menghapus Data Pengguna');
    }

}
