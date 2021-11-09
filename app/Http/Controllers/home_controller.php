<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\danhmuc;
use App\Models\sanpham;
use App\Models\khachhang;
use Illuminate\Support\Facades\DB;
use App\Helper\giohang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class home_controller extends Controller
{
    public function index(){
       
        return view('home');
    }
    public function chitiet($id){
        $data=sanpham::find($id);
        return view('chitiet',compact('data'));
    }
    public function shop(){
        return view('shop');
    }
    public function get_dangnhap(){
       return view('login_kh');
 
    }
    public function getdangky(){

        return view('dangky');
  
     }
     public function postdangky(Request $request){
        
        $data=new khachhang;
        $data->hovaten=$request->hovaten;
        $data->gioitinh=$request->gioitinh;
        $data->sdt=$request->sdt;
        $data->cmnd=$request->cmnd;
        $data->ngaysinh=$request->ngaysinh;
        $data->diachi=$request->diachi;
        $data->email=$request->email;
        $data->tendangnhap=$request->tendangnhap;
        $data->password=bcrypt($request->password);
        if($data->save()){
            return redirect('/dangnhap/index');
        }

  
     }
    public function dangxuat(){
       Auth::guard('khachhang')->logout();
       
        return view('home');
  
    }
    public function show($slug){
        $dm=danhmuc::where('slug',$slug)->first();
        return view('show',compact('dm'));
    }
    public function post_dangnhap(Request $request){
       
        $arr=[
            'tendangnhap'=>$request->tendangnhap,
            'password'=>$request->password
        ];

        if(Auth::guard('khachhang')->attempt($arr))
        {
            return redirect('/');
        }
        else{
            return redirect('/dangnhap/index');

        }
  
    }
    
}
