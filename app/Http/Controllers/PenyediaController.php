<?php

namespace App\Http\Controllers;

use App\Models\Penyedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenyediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Penyedia::all();
        return view('penyedia.penyedia',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penyedia.create_penyedia');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Penyedia::create([
        'nama_penyedia' => $request->nama,
        'alamat_penyedia' => $request->alamat,
        'telepon_penyedia' => $request->telepon,
        ]);

        return redirect()->route('admin.penyedia')->with('success', 'Berhasil membuat data Penyedia baru');
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
        $data = Penyedia::find($id);
        return view('penyedia.edit_penyedia', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_penyedia)
    {
        $data = Penyedia::find($id_penyedia);
        // dd($request->all()); 
        $validator = Validator::make($request->all(),[
            'nama_penyedia'    => 'required',
            'alamat_penyedia'  => 'required',
            'telepon_penyedia'  => 'required',
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data->update($request->all());

        return redirect()->route('admin.penyedia');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Penyedia::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin.penyedia');
    }
}
