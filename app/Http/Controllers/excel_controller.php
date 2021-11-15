<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Excel;
use App\Imports\sanpham_import;
use App\Exports\sanpham_export;
use App\Models\sanpham;

class excel_controller extends Controller
{
    public function postnhap(Request $request){
        dd('dadadad');
        Excel::import(new sanpham_import,$request->file('file_excel'));
        return redirect('admin/sanpham');
    }
    public function getxuat(){
       
        return Excel::download(new sanpham_export,'danh-sach-san-pham');
    }
}
