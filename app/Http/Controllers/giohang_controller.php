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
   public function themgiohang(giohang $giohang,$id){
       
        $sanpham=sanpham::find($id);
        $giohang->them($sanpham);
        return redirect()->back();
 
   }
     public function index(){
      return view('giohang');
   }
     public function xoa(giohang $giohang,$id){
        
         $giohang->xoa($id);
         return redirect()->back();
  
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
