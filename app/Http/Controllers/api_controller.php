<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sanpham;
class api_controller extends Controller
{
    public function ajax_search()
    {
        $data=sanpham::search()->get();
        $result=[
            'status'=>true,
            'message'=>'Tìm được'.$data->count().'kết quả',
            'data'=>$data,
        ];
        return $data;
    }
}
