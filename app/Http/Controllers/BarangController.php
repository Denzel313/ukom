<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Penyedia;
use App\Models\PinjamAlat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    
    public function barang_masuk(Request $request){
        $data = BarangMasuk::paginate(2);
        return view('barang.masuk.masuk', compact('data'));
    }

    public function create_masuk(Request $request){
        $data = Alat::all();
        $penyedia = Penyedia::all();
        return view('barang.masuk.create_masuk', compact('penyedia','data'));
    }

    public function proses_masuk(Request $request){
        // dd($request->all());
        // $id_barang = DB::table('alats')->where('nama_barang', $request->nama_barang)->first();
        BarangMasuk::create([
            'id_barang' => $request->id_barang,
            'tgl_masuk' => now(),
            'jml_masuk' => $request->jml_masuk,
            'id_penyedia' => $request->id_penyedia,
        ]);

        return redirect()->route('admin.barang-masuk')->with('success', 'Berhasil membuat data Barang Masuk baru');
    }

    public function delete_masuk(String $id){
        $data = BarangMasuk::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin.barang-masuk');
    }

    public function barang_keluar(Request $request){
        $data = BarangKeluar::all();

        return view('barang.keluar.keluar', compact('data'));
    }

    public function create_keluar(){
        $data = Alat::all();
        $peminjam = PinjamAlat::all();
        return view('barang.keluar.create_keluar', compact('data','peminjam'));
    }

    public function proses_keluar(Request $request){
       // dd($request->all());
       BarangKeluar::create([
        'id_barang' => $request->id_barang,
        'nama_barang' => $request->nama_barang,
        'tgl_keluar' => $request->tgl_keluar,
        'jml_keluar' => $request->jml_keluar,
        'lokasi' => $request->lokasi,
        'penerima' => $request->penerima
    ]);

    return redirect()->route('admin.barang-keluar')->with('success', 'Berhasil membuat data Barang Masuk baru');
    }

    public function delete_keluar(String $id){
        $data = BarangKeluar::find($id);

        if($data){
            $data->delete();
        }

        return redirect()->route('admin.barang-masuk');
    }
}
