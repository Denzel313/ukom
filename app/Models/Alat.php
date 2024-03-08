<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_barang',
        'spesifikasi',
        'lokasi',
        'kondisi',
        'jumlah_barang',
        'sumber_dana'
    ];

    public function barang_masuk()
    {
        return $this->hasMany(BarangMasuk::class, 'id_barang', 'id');
    }
}
