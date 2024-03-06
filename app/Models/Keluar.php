<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluar extends Model
{
    use HasFactory;
    protected $table = 'barang_keluar';
    // protected $primaryKey = 'id';
    protected $fillable = [
        'id_barang',
        'nama_barang',
        'tgl_keluar',
        'jml_keluar',
        'lokasi',
        'penerima',
        'updated_at',
    ];

    protected $casts = [
        'tgl_keluar' => 'datetime'
    ];
}
