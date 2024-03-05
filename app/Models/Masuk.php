<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuk';
    // protected $primaryKey = 'id_barang';
    protected $fillable = [
        'id_barang',
        'nama_barang',
        'tgl_masuk',
        'jml_masuk',
        'id_penyedia',
        'nama_penyedia',
        'updated_at',
    ];
}
