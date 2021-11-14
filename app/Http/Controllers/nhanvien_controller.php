<?php

namespace App\Http\Controllers;
use App\Models\nhanvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\chucvu;
use App\Models\User;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class nhanvien_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=nhanvien::search()->paginate(10);
        return view('admin.nhanvien.index',compact('data'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chucvu=chucvu::all();
        return view('admin.nhanvien.create',compact('chucvu'));  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messages = [
            'hovaten.required' => 'Họ và tên không được bỏ trống',
            'gioitinh.required' => 'Giới tính không được bỏ trống',
            'ngaysinh.required' => 'Ngày sinh không được bỏ trống',
            'diachi.required' => 'Địa chỉ không được bỏ trống',
            'sdt.required' => 'Số điện thoại không được bỏ trống',
            'cmnd.required' => 'Chứng minh không được bỏ trống',
            'chucvu_id.required' => 'Chức vụ không được bỏ trống',
            'tendangnhap.required' => 'Tên đăng nhập không được bỏ trống',
            'password.required' => 'Password không được bỏ trống',
            'email.required' => 'email không được bỏ trống',
        ];

        $request->validate([
            'hovaten'=>'required|max:100|unique:nhanvien',
            'gioitinh'=>'required|numeric',
            'diachi'=>'required|max:100|unique:nhanvien',
            'sdt'=>'required|numeric|unique:nhanvien',
            'cmnd'=>'required|numeric|unique:nhanvien',
            'chucvu_id'=>'required|numeric',
            'tendangnhap'=>'required|max:100|unique:nhanvien',
            'password'=>'required|max:100|unique:nhanvien',
            'email'=>'required|max:100|unique:nhanvien',
        ],$messages);
        $data=new nhanvien;
        $data->hovaten=$request->hovaten;
        $data->gioitinh=$request->gioitinh;
        $data->ngaysinh=$request->ngaysinh;
        $data->diachi=$request->diachi;
        $data->sdt=$request->sdt;
        $data->cmnd=$request->cmnd;
        $data->chucvu_id=$request->chucvu_id;
        $data->tendangnhap=$request->tendangnhap;
        $data->password=Hash::make($request->password);
        $data->email=$request->email;
       if($data->save()) {
           return redirect('admin/nhanvien');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function show(nhanvien $nhanvien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chucvu=chucvu::all();
        $data=nhanvien::find($id);
        return view('admin.nhanvien.edit',compact('data','chucvu'));  
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=nhanvien::find($id);
        $data->hovaten=$request->hovaten;
        $data->gioitinh=$request->gioitinh;
        $data->ngaysinh=$request->ngaysinh;
        $data->diachi=$request->diachi;
        $data->sdt=$request->sdt;
        $data->cmnd=$request->cmnd;
        $data->chucvu_id=$request->chucvu_id;
        $data->tendangnhap=$request->tendangnhap;
        $data->email=$request->email;
        if(!empty($request->password)) 
        $data->password =Hash::make($request->password);
		
       
       if($data->save()) {
           return redirect('admin/nhanvien');
       }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nhanvien  $nhanvien
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(nhanvien::find($id)->delete())
            return redirect('admin/nhanvien');
    }

    public function getdangnhap(){
        return view('admin.login');
    }
   
    public function postdangnhap(Request $request){
      
        
        $arr=[
            'tendangnhap'=>$request->tendangnhap,
            'password'=>$request->password
           
        ];
        
        if(Auth::attempt($arr)){
            
            return redirect('admin/');
        }
        else{
            
            return redirect('admin/dangnhap');
        }

        
    }
    public function dangxuat(){
        Auth::logout();

        return redirect('admin/dangnhap');
    }
}
