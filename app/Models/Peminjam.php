<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;
    protected $table = 'pinjam_alat';
    protected $primaryKey = 'id_pinjam';
    protected $fillable = [
        'peminjam',
        'tgl_pinjam',
        'id_barang',
        'nama_barang',
        'jml_barang',
        'tgl_kembali',
        'kondisi',
        'updated_at',
    ];
    protected $casts = [ 
        "tgl_pinjam" => "datetime",
        "tgl_kembali" => "datetime",
     ];
}
