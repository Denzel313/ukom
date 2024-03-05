<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(Request $request){
        $data = new User;

        if($request->get('search')){
            $data = $data->where('name','LIKE','%'.$request->get('search').'%')->orWhere('email','LIKE','%'.$request->get('search').'%');
        }

        // Jika ingin menambah filter by tanggal
        // if($request->get('tanggal')){
        //     $data = $data->where('name','LIKE','%'.$request->get('search').'%')->orWhere('email','LIKE','%'.$request->get('search').'%');
        // }

        $data = $data->get();

        return view('index', compact('data','request'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        // dd($request->all()); var dump
        $validator = Validator::make($request->all(),[
            'photo' => 'required|mimes:png,jpg,jpeg,|max:2048',
            'email' => 'required|email|unique:users,email',
            'nama' => 'required',
            'password' => 'required|min:6'
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        //Menambahkan foto ke lokal
        $photo = $request->file('photo');
        $filename = date('Y-m-d').$photo->getClientOriginalName();
        $path = 'photo-user/'.$filename;

        Storage::disk('public')->put($path,file_get_contents($photo));

        $data['email'] = $request->email;
        $data['name'] = $request->nama;
        $data['password'] = Hash::make($request->password);
        $data['image'] = $filename;

        User::create($data);

        return redirect()->route('admin.index');
    }

    public function edit(Request $request,$id){
        $data = User::find($id);

        return view('edit',compact('data'));
    }

    public function update(Request $request,$id){
        // dd($request->all()); var dump
        $validator = Validator::make($request->all(),[
            'email'    => 'required|email',
            'nama'     => 'required',
            'password' => 'nullable'
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['email'] = $request->email;
        $data['name'] = $request->nama;

        if($request->password){
            $data['password'] = Hash::make($request->password);
        }

        User::whereId($id)->update($data);

        return redirect()->route('admin.index');
    }

    public function delete(Request $request,$id){
        $data = User::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin.index');
    }
}
