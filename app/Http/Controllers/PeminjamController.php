<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\PinjamAlat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PinjamAlat::all();
        return view('peminjaman.peminjam',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = PinjamAlat::all();
        $barang = Alat::all();
        return view('peminjaman.create_peminjam',compact('data','barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  dd($request->all());
        PinjamAlat::create([
            'peminjam' => $request->peminjam,
            'tgl_pinjam' => $request->tgl_pinjam,
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'jml_barang' => $request->jml_barang,
            'tgl_kembali' => $request->tgl_kembali,
            'kondisi' => $request->kondisi,
        ]);

        return redirect()->route('admin.peminjaman')->with('success', 'Berhasil membuat data Alat Bahan baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = PinjamAlat::find($id);
        $barang = Alat::all();

        return view('peminjaman.edit_peminjam',compact('data','barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = PinjamAlat::find($id);
        // dd($request->all()); 
        $validator = Validator::make($request->all(),[
            'peminjam'      => 'required',
            'tgl_pinjam'    => 'required',
            'nama_barang'   => 'required',
            'jml_barang'    => 'required',
            'tgl_kembali'   => 'required',
            'kondisi'       => 'required',
            
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data->update($request->all());

        return redirect()->route('admin.peminjaman');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = PinjamAlat::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin.peminjaman');
    }
}
