<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\giohang;
use App\Models\sanpham;

class giohang_controller extends Controller
{
   public function __construct()
   {
     
   }
   public function view(){
      return view('giohang.donhang');

   }
   
   public function themgiohang(giohang $giohang,$id){
       
        $sanpham=sanpham::find($id);
        $giohang->them($sanpham);
        return response()->json([
           'message'=>'Sản phẩm đã được thêm vào giỏ',
        ]);
 
   }
      public function index(){
      return view('giohang');
   }
      public function xoa(giohang $giohang,$id){
        
         $giohang->xoa($id);
         return redirect()->back();
  
      }
      public function capnhat_tang(giohang $giohang,$id){
        
         $giohang->capnhat_tang($id);
         return response()->json([
            'message'=>'cập nhật tăng thành công',
            'code'=>1,
         ]);
  
      }
      public function capnhat_giam(giohang $giohang,$id){
        
         $giohang->capnhat_giam($id);
         return response()->json([
            'message'=>'cập nhật giảm thành công',
            'code'=>1,
         ]);
  
      }
      public function xoatatca(giohang $giohang){
        
         $giohang->xoatatca();
         return redirect()->back();
  
      }
      public function capnhat(giohang $giohang,$id,Request $request){
         $soluong=$request->soluong ? $request->soluong:1;
         $giohang->capnhat($id,$soluong);
         return redirect()->back();
      }
     
}
