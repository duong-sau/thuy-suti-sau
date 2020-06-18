<?php

namespace App\Exports;

use App\LoaiSanPham;
use Maatwebsite\Excel\Concerns\FromCollection;

class LoaiSanPhamExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return LoaiSanPham::all();
    }
}
