<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\danhmuc;
use App\Models\sanpham;
use App\Models\khachhang;
use Illuminate\Support\Facades\DB;
use App\Helper\giohang;
use Dotenv\Validator as DotenvValidator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use Mail;
use File;
use Validator;
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
         
        $validator=Validator::make($request->all(),[
             'hovaten'=>'required',
             'gioitinh'=>'numeric|required',
             'cmnd'=>'required|numeric',
             'diachi'=>'required',
             'sdt'=>'required|numeric',
             'email'=>'required|unique:khachhang|email',
             'tendangnhap'=>'required|unique:khachhang',
             'password'=>'required',
             'password_c'=>'required|same:password',

         ],[
             'hovaten.required'=>'Họ và tên không được bỏ trống',
             'gioitinh.required'=>'gioi tinh không được bỏ trống',
             'cmnd.required'=>'gioi tinh không được bỏ trống',
             'cmnd.numeric'=>'cmnd phải là số',
             'diachi.required'=>'dia chi không được bỏ trống',
             'sdt.required'=>'sdt không được bỏ trống',
             'sdt.numeric'=>'sdt phải là số',
             'email.required'=>'email không được bỏ trống',
             'email.email'=>'Định dạng email không đúng',
             'email.unique'=>'email đã được sử dụng',
             'tendangnhap.required'=>'ten dang nhap không được bỏ trống',
             'tendangnhap.unique'=>'ten dang nhap đã được sử dụng',
             'password.required'=>'mật khẩu không được bỏ trống',
             'password_c.required'=>'xác nhận mật khẩu không được bỏ trống',
             'password_c.same'=>'xác nhận mật khẩu phải trùng ',
             
         ]);
         if($validator->passes()){

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
                return response()->json([[1]]);
                //return redirect('/dangnhap/index')->with('yes','Bạn đã đăng ký thành công vui lòng kích hoạt tài khoản qua email');
               
            }

         }
         return response()->json(['error'=>$validator->errors()->all()]);
        
       
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
        $id=Auth::guard('khachhang')->user()->id;
        $validator=Validator::make($request->all(),[
            'hovaten'=>'required',
            'ngaysinh'=>'date|required',
            'gioitinh'=>'required|numeric',
            'diachi'=>'required',
            'sdt'=>'required|numeric',
            'cmnd'=>'required|numeric',
            'email'=>'required|email',
        ],[
            'hovaten.required'=>'không được bỏ trống họ và tên',
            'ngaysinh.required'=>'không được bỏ trống ngày sinh',
            'gioitinh.required'=>'không được bỏ trống giới tính',
            'diachi.required'=>'không được bỏ trống địa chỉ',
            'sdt.required'=>'không được bỏ trống sdt',
            'sdt.numeric'=>'sdt phải là số',
            'cmnd.required'=>'không được bỏ trống cmnd',
            'cmnd.numeric'=>'cmnd phải là số',
            'email.required'=>'không được bỏ trống email',
            'email.numeric'=>'email phải có định dạng email',


        ]);
        if($validator->passes()){

            if($request->file_anh!=null){
                $file=$request->file_anh;
                $ex=$request->file_anh->extension();
                $file_name=time().'-'.$request->hovaten.'.'.$ex;
                $file->move(public_path('khachhang'),$file_name);
    
                $data=khachhang::find($id);
                File::delete('public/khachhang/'.$data->anh);
                $request->merge(['anh'=>$file_name]);
            }
            if($kh=khachhang::find($id)->update($request->all())){
                return response()->json(['data'=>$kh]);
            }
        }
        return response()->json(['error'=>$validator->errors()->all()]);

    }
    public function doimatkhau(){
        return view('khachhang.doimatkhau');
    }
    public function postdoimatkhau(Request $request){
        $id=Auth::guard('khachhang')->user()->id;
        $kh=khachhang::find($id);
        $error=Validator::make($request->all(),[
            'password_cu'=>'required',
            'password_moi'=>'required',
            'password_xacnhan'=>'required|same:password_moi',
        ],[
            'password_cu.required'=>'Mật khẩu cũ không được bỏ trống',
            'password_moi.required'=>'Mật khẩu mới không được bỏ trống',
            'password_xacnhan.required'=>'Xác nhận Mật khẩu mới không được bỏ trống',
            'password_xacnhan.same'=>'Xác nhận Mật khẩu không chính xác',
        ]);
        if($error->passes()){
            if(Hash::check($request->password_cu,$kh->password)){
           
                $validator=Validator::make($request->all(),[
                    'password_moi'=>'required',
                    'password_xacnhan'=>'required|same:password_moi',
                ],[
                    'password_moi.required'=>'Mật khẩu mới không được bỏ trống',
                    'password_xacnhan.required'=>'Xác nhận Mật khẩu mới không được bỏ trống',
                    'password_xacnhan.same'=>'Xác nhận Mật khẩu không chính xác',
    
                ]);
                if($validator->passes()){
                    $kh->password= bcrypt($request->password_moi);
                    $kh->save();
                    return response()->json([
                        'message'=>'Đổi mật khẩu thành công',
                        'code'=>200,
                    ]);
    
                }
                return response()->json([
                    'error'=>$validator->errors()->all(),
                    'code'=>404,
                ]);
               
              
            }
            else{
                return response()->json([
                    'error'=>'Mật khẩu cũ sai',
                    'code'=>404,
                ]);
            }

        }
        return response()->json([
            'error'=>$error->errors()->all(),
            'code'=>404,
        ]);
        
        
    }

    public function dropdown(){

        return view('giohang.dropdown');
    }
    
}
