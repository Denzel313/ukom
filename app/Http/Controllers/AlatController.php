<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Masuk;
use App\Models\Penyedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlatController extends Controller
{
    public function index(Request $request){
        $alat = Alat::all();
        $data = Masuk::all();

        return view('alat.alat', compact('alat','data'));
        return abort(403);
    }

    public function create(){
        $alat = Alat::all();
        $data = Penyedia::all();

        return view('alat.create_alat', compact('alat','data'));
    }

    public function store(Request $request){
        // dd($request->all());
        Alat::create([
            'nama_barang' => $request->nama_barang,
            'spesifikasi' => $request->spesifikasi,
            'lokasi' => $request->lokasi,
            'kondisi' => $request->kondisi,
            'jumlah_barang' => $request->jumlah_barang,
            'id_penyedia' => $request->id_penyedia,
            'sumber_dana' => $request->sumber_dana,
        ]);

        return redirect()->route('admin.alat-bahan')->with('success', 'Berhasil membuat data Alat Bahan baru');
    }

    public function edit(Alat $alat, $id_barang){
        $alat = Alat::find($id_barang);

        return view('alat.edit_alat',compact('alat'));
    }

    public function update(Request $request, $id_barang){
        $alat = Alat::find($id_barang);
        // dd($request->all()); 
        $validator = Validator::make($request->all(),[
            'nama_barang'    => 'required',
            'spesifikasi'    => 'required',
            'lokasi'         => 'required',
            'kondisi'        => 'required',
            'jumlah_barang'  => 'required',
            'sumber_dana'    => 'required',
            
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $alat->update($request->all());

        return redirect()->route('admin.alat-bahan');
    }

    public function delete(Request $request, $id){
        $alat = Alat::find($id);

        if($alat){
            $alat->delete();
        }

        return redirect()->route('admin.alat-bahan');
    }
}
