<?php
  
namespace App\Imports;

use App\Models\BarangMasuk;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;
  
class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BarangMasuk([
            'id_barang'     => $row['id_barang'],
            'nama_barang'    => $row['nama_barang'], 
            'created_at' => $row['created_at'],
            'jml_masuk' => $row['jml_masuk'],
            'id_penyedia' => $row['id_penyedia'],
        ]);
    }
}