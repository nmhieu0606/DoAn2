<?php

namespace App\Imports;

use App\Models\sanpham;
use Maatwebsite\Excel\Concerns\ToModel;

class sanpham_import implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new sanpham([ 
            'tensp'=>$row[0], 
            'anh'=>$row[1],
            'soluong'=>$row[2], 
            'chitiet'=>$row[3], 
            'gianhap'=>$row[4], 
            'giaxuat'=>$row[5],
            'nhanhieu_id'=>$row[6],
            'xuatxu_id'=>$row[7], 
            'baohanh_id'=>$row[8],
            'danhmuc_id'=>$row[9],
        ]);
    }
}
