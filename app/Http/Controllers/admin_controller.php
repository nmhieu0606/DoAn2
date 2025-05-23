<?php

namespace App\Http\Controllers;
use App\Models\nhanvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\chucvu;
use App\Models\User;
use App\Models\dathang;
use App\Models\dathang_chitiet;
use App\Models\khachhang;
use App\Models\sanpham;




class admin_controller extends Controller
{
   public function index(){
       $sp=sanpham::all();
       $kh=khachhang::all();
       $dh=dathang::where('nhanvien_id',null)->get();
       $nv=nhanvien::all();
       if(request()->ngaybatdau && request()->ngayketthuc){ 
          

           $dh1=dathang::where('tinhtrang_id',5)->whereBetween('ngaydathang',[request()->ngaybatdau,request()->ngayketthuc])->get();
           foreach($dh1 as $item)
           {
               $chart[]=array(
                   'id'=>$item->id,
                   'tongtien'=>$item->tongtien,
                   'ngaydathang'=>$item->ngaydathang,
                   'sum'=>$item->sum('tongtien'),  
               );
               
           }
           return response()->json([
               'dh'=>$chart,

           ]);  
           //return view('admin.index',compact('sp','kh','dh','nv','dh1'));
       }
       return view('admin.index',compact('sp','kh','dh','nv'));
   }
   
   
    
    public function error(){
        
       $code=request()->code;
       return view('admin.error',compact('code'));
    }
   
    
   
   

}
