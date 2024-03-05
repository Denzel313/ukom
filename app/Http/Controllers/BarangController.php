<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Masuk;
use App\Models\Penyedia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    
    public function barang_masuk(Request $request){
        $data = Masuk::all();
        
        return view('barang.masuk.masuk', compact('data'));
    }

    public function create_masuk(Request $request){
        $data = Alat::all();
        $penyedia = Penyedia::all();
        return view('barang.masuk.create_masuk', compact('penyedia','data'));
    }

    public function proses_masuk(Request $request){
        // dd($request->all());
        Masuk::create([
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'tgl_masuk' => now(),
            'jml_masuk' => $request->jml_masuk,
            'id_penyedia' => $request->id_penyedia,
            'nama_penyedia' => $request->nama_penyedia
        ]);

        return redirect()->route('admin.barang-masuk')->with('success', 'Berhasil membuat data Barang Masuk baru');
    }

    public function edit_masuk(Request $request,$id){
        $data = Masuk::find($id);
        $penyedia = Penyedia::all();

        return view('barang.masuk.edit_masuk',compact('data','penyedia'));
    }

    public function update(Request $request, $id_barang){
        $data = Masuk::find($id_barang);
       
        // dd($request->all()); 
        $validator = Validator::make($request->all(),[
            'id_barang' => 'required',
            'nama_barang'    => 'required',
            'tgl_masuk'    => 'required',
            'jml_masuk'         => 'required',
            'id_penyedia'        => 'required',
            'nama_penyedia'  => 'required',
            
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data->update($request->all());

        return redirect()->route('admin.barang-masuk');
    }

    public function delete_masuk(String $id){
        $data = Masuk::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin.barang-masuk');
    }

    public function barang_keluar(Request $request){
        $data = new User;

        return view('barang.keluar.keluar', compact('data','request'));
    }

    public function create_keluar(){
    }

    public function proses_keluar(Request $request){
       
    }

    public function edit_keluar(){

    }


    public function delete_keluar(){

    }
}
