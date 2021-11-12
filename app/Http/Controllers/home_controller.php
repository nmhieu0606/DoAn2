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
use Illuminate\Support\Str;
use Mail;
use File;
use Illuminate\Support\Facades\Hash;

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
       
        $token=strtoupper(Str::random(10));
        $data=$request->only('tendangnhap','email','hovaten','ngaysinh','gioitinh','diachi','sdt','cmnd');
        $data['password']=bcrypt($request->password);
        $data['token']=$token;
        $data['status']=0;
        if($kh=khachhang::create($data)){
            Mail::send('email.kichhoat_tk',compact('kh'),function($email) use($kh){
                $email->subject('ShopMobile - Xác nhận tài khoản');
                $email->to($kh->email,$kh->hovaten);
            });
            return redirect('/dangnhap/index')->with('yes','Bạn đã đăng ký thành công vui lòng kích hoạt tài khoản qua email');
        }
       
     }
     public function quenmatkhau(){

         return view('quenmatkhau.index');
     }
    public function postquenmatkhau(Request $request){
        $request->validate([
            'email'=>'required|exists:khachhang',
        ],[
            'email.required'=>'Vui lòng nhập email',
            'email.exists'=>'Email không tồn tại',
        ]);
        $kh=khachhang::where('email',$request->email)->first();
        $token=strtoupper(Str::random(10));
        $kh->update(['token'=>$token]);
        Mail::send('email.quenmatkhau',compact('kh'),function($email) use($kh){
            $email->subject('ShopMobile - Lấy lại mật khẩu');
            $email->to($kh->email,$kh->hovaten);

        });
        return redirect('/dangnhap/index')->with('yes','Bạn đã gửi yêu cầu đặt lại mật khẩu vui lòng check email để đặt lại mật khẩu');
       
    }

    public function kichhoatmatkhau($kh,$token){

        $data=khachhang::find($kh);
        if($data->token===$token){
           
            return view('quenmatkhau.laylaimatkhau',compact('kh','token'))->with('yes','Xác nhận thành công vui lòng đặt lại mật khẩu');
        }
        else{
            return abort(404);
        }
      
       
    }
    public function laylaimatkhau(Request $request,$kh,$token){
        $request->validate([
            'password'=>'required',
            'password_c'=>'required|same:password',
           
        ],[
            'password.required'=>'Khổng được bỏ trống mật khẩu',
            'password_c.required'=>'Khổng được bỏ trống xác nhận mật khẩu',
            'password_c.same'=>'Xác nhận mật khẩu không đúng',
        ]);
        
        $data=khachhang::find($kh);
        $data->password=bcrypt($request->password);
        $data->token=null;
       if($data->save()){
           return redirect('/dangnhap/index')->with('yes','Bạn đã đổi mật khẩu thành công và có thể đăng nhập');
       }

    }
     public function kichhoat($khachhang,$token){
         $data=khachhang::find($khachhang);
         if($data->token===$token){
             $data->status=1;
             $data->token=null;
             $data->save();
             return redirect('/dangnhap/index')->with('yes','Bạn đạ kích hoạt tài khoản thành công vui lòng đăng nhập');
         }
         else{
            return redirect('/dangnhap/index')->with('no','Lỗi kích hoạt tài khoản');

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
            if(Auth::guard('khachhang')->user()->status==0){
                Auth::guard('khachhang')->logout();
                return redirect('/dangnhap/index')->with('no','Tài khoản chưa kích hoạt');
            }
            return redirect('/');
        }
        else{
            return redirect('/dangnhap/index')->with('no','Tài khoản hoặc mật khẩu sai');

        }
  
    }

    public function taikhoan(){
       $data= Auth::guard('khachhang')->user();
        return view('khachhang.index',compact('data'));

    }
    public function update(Request $request){
        // $request->validate([
        //     'hovaten'=>'required|string',
        //     'ngaysinh'=>'required|date',
        //     'cmnd'=>'required|numeric|max:10',
        //     'diachi'=>'required|string',
        //     'sdt'=>'required|numeric|max:11',
        //     'email'=>'email|required',
        // ]);
        $id=Auth::guard('khachhang')->user()->id;
        $data=khachhang::find($id);
        if($request->has('file_anh')){
            $hovaten=Str::slug($request->hovaten);
            $file=$request->file_anh;
            $ex=$request->file_anh->extension();
            $file_name=time().'-'.$hovaten.'.'.$ex;
            $file->move(public_path('khachhang'),$file_name);
           
            if($data->anh!=null){
                File::delete('public/khachhang/'.$data->anh);
            } 
            
            $data->anh=$file_name;
            $data->save();
        }
        
        $data->hovaten=$request->hovaten;
        $data->ngaysinh=$request->ngaysinh;
        $data->gioitinh=$request->gioitinh;
        $data->diachi=$request->diachi;
        $data->sdt=$request->sdt;
        $data->cmnd=$request->cmnd;
        $data->email=$request->email;
        if($data->save()){
            return redirect()->back()->with('yes','Cập nhật thông tin thành công');
        }
        
       
        
    }
    public function doimatkhau(){
        return view('khachhang.doimatkhau');
    }
    public function postdoimatkhau(Request $request){
        $id=Auth::guard('khachhang')->user()->id;
        $kh=khachhang::find($id);
        
        if(Hash::check($request->password_cu,$kh->password)){
           
            $request->validate([
                'password_moi'=>'required',
                'password_xacnhan'=>'required|same:password_moi',
            ]);
            $kh->password= bcrypt($request->password_moi);
            if($request->password_moi)
            return redirect('/')->with('yes','Đổi mật khẩu thành công');

        }
        else{
            return redirect()->back()->with('no','Mật khẩu cũ sai');
        }
    }
    
}
