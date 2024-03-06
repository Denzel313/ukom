<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    use HasFactory;
    protected $table = 'alatbahan';
    protected $primaryKey = 'id_barang';
    protected $fillable = [
        'nama_barang',
        'spesifikasi',
        'lokasi',
        'kondisi',
        'jumlah_barang',
        'sumber_dana',
        'id_penyedia',
        'updated_at',
    ];

    // protected $casts = [
    //     'updated_at' => 'datetime',
    //     'created_at' => 'datetime',
    // ];
}
