<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_barang',
        'tgl_masuk',
        'jml_masuk',
        'id_penyedia',
    ];

    public function barang()
    {
        return $this->belongsTo(Alat::class, 'id_barang');
    }

    public function penyedia()
    {
        return $this->belongsTo(Penyedia::class, 'id_penyedia','id_penyedia');
    }
}
