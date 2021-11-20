<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\khachhang;
use App\Models\sanpham;
use App\Models\comment;
use App\Models\dathang;
use App\Models\dathang_chitiet;

use Validator;

class ajax_controller extends Controller
{
    public function dangnhap(Request $request){
        $validator=Validator::make($request->all(),[
            'tendangnhap'=>'required|exists:khachhang',
            'password'=>'required',

        ],[
            'tendangnhap.required'=>'Tên đăng nhập không được trống',
            'tendangnhap.exists'=>'Tên đăng nhập hoặc mật khẩu sai',
            'password.required'=>'Mật khẩu không được bỏ trống',
        ]);
        if($validator->passes()){
            $arr=[
                'tendangnhap'=>$request->tendangnhap,
                'password'=>$request->password
            ];
            if(Auth::guard('khachhang')->attempt($arr))
            {
               
                if(Auth::guard('khachhang')->user()->status==0){
                    Auth::guard('khachhang')->logout();
                    return response()->json(['error'=>['Tài khoản chưa được kích hoạt']]);
                }

                return response()->json(['data'=>Auth::guard('khachhang')->user()]);
            }
           

        }
        return response()->json(['error'=>$validator->errors()->all()]);


        

    }
    public function binhluan(Request $request,$sanpham_id){
        $kh_id=Auth::guard('khachhang')->user()->id;
        $validator=Validator::make($request->all(),[
            'comment'=>'required',
        ],[
            'comment.required'=>'Nội dung bình luận không được trống',
        ]);
        if($validator->passes()){
           $data=[
               'sanpham_id'=>$sanpham_id,
               'khachhang_id'=>$kh_id,
               'comment'=>$request->comment,
                'reply_id'=>$request->reply_id ? $request->reply_id:0,

           ];
            if($comment=comment::create($data)){
                $cm=comment::where(['sanpham_id'=>$sanpham_id,'reply_id'=>0])->orderBy('id','DESC')->get();
                return view('list_comment',compact('cm'));
            }
           
        }
        return response()->json(['error'=>$validator->errors()->first()]);

    }
    public function doanhthu(Request $request){
        if(request()->ngaybatdau && request()->ngayketthuc){    
            $dh1=dathang::where('tinhtrang_id',5)->whereBetween('ngaydathang',[request()->ngaybatdau,request()->ngayketthuc])->get();
            response()->json([
                'data'=>$dh1,
            ]);
        }

    }
}
