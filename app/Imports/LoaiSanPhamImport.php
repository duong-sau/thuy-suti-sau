<?php

namespace App\Imports;

use App\LoaiSanPham;
use Maatwebsite\Excel\Concerns\ToModel;

class LoaiSanPhamImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new LoaiSanPham([
            // 'id'=>$row[0],
            'tenloai'=>$row[1],
            'Delet'=>$row[2],
        ]);
    }
}
