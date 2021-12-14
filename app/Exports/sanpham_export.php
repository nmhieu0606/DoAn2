<?php

namespace App\Exports;

use App\Models\sanpham;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMapping;


class sanpham_export implements FromCollection,WithHeadings,WithCustomStartCell,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return sanpham::all();
    }
    public function headings(): array
    {
        return [
            'tensp', 
            'anh',
            'soluong', 
            'chitiet', 
            'gianhap', 
            'giaxuat',
            'nhanhieu_id',
            'xuatxu_id', 
            'baohanh_id',
            'danhmuc_id',
            'sale',
            'giasale',
        ];
    }
    public function map($row): array
    {
        return [
            $row->tensp,
            $row->anh,
            $row->soluong,
            $row->chitiet,
            $row->gianhap,
            $row->giaxuat,
            $row->nhanhieu_id,
            $row->xuatxu_id,
            $row->baohanh_id,
            $row->danhmuc_id,
            $row->sale,
            $row->giasale,

        ];
    }
    public function startCell(): string
    {
        return 'A6';
    }


}
