<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyedia extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_penyedia',
        'alamat_penyedia',
        'telepon_penyedia',
    ];

    public function barang_masuk()
    {
        return $this->hasMany(BarangMasuk::class, 'id_penyedia', 'id');
    }
}
