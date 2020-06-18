<?php

namespace App\Imports;

use App\sanpham;
use Maatwebsite\Excel\Concerns\ToModel;

class SanPhamImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new sanpham([
            'name'=>$row[1],
            'id_loai_sp'=>$row[2],
            'id_ncc'=>$row[3],
            'mota_sp'=>$row[4],
            'unit_price'=>$row[5],
            'gia_km'=>$row[6],
            'so_luong'=>$row[7],
            'image'=>$row[8],
            'don_vi_tinh'=>$row[9],
            'Delet'=>$row[10],
            'new'=>$row[11]
        ]);
    }
}
