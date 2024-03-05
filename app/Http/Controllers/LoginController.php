<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class LoginController extends Controller
{
    //

    public function index(){
        return view('auth.login');
    }

    public function login_proses(Request $request){
        $request->validate([
            'username'     => 'required',
            'password'  => 'required'
        ]);

        $data = [
            'username' => $request->username,
            'password' =>$request->password
        ];

        if(Auth::attempt($data)){
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('login')->with('failed', 'Username atau Password Salah');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', 'Kamu berhasil logout');
    }

    public function register(){
        return view('auth.register');
    }

    public function register_proses(Request $request){
        $request->validate([
            // 'photo' => 'required|mimes:png,jpg,jpeg,|max:2048',
            'nama' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        //Menambahkan foto ke lokal
        // $photo = $request->file('photo');
        // $filename = date('Y-m-d').$photo->getClientOriginalName();
        // $path = 'photo-user/'.$filename;

        // Storage::disk('public')->put($path,file_get_contents($photo));

        $data['name']       = $request->nama;
        $data['username']   = $request->username;
        $data['email']      = $request->email;
        $data['password']   = Hash::make($request->password);
        $data['level']   = $request->level;
        // $data['image'] = $filename;

        User::create($data);

        $login = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($login)){
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('register')->with('failed', 'Email atau Password Salah');
        }

    }
}
