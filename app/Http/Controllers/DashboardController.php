<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Keluar;
use App\Models\Masuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['role:admin']);
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hitung = DB::table('users')->count();
        $data = Alat::all();

        $masuk = DB::table('barang_masuks')
        ->select('jml_masuk')
        ->get();
      
        return view('dashboard', compact('data','hitung'));
        return abort(403);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Alat::all();

        return view('dashboard', compact('data'));

    }
}
