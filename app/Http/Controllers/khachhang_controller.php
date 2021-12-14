<?php

namespace App\Http\Controllers;

use App\Models\khachhang;
use Illuminate\Http\Request;


class khachhang_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=khachhang::search()->paginate(10);
        return view('admin.khachhang.index',compact('data'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.khachhang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'hovaten'=>'required|max:100',
            'sdt'=>'required|numeric|unique:khachhang',
            'cmnd'=>'required|numeric|unique:khachhang',
            'email'=>'required|max:100|unique:khachhang',
            'tendangnhap'=>'required|max:100|unique:khachhang',
            
        ]);

        $data=new khachhang;
        $data->hovaten=$request->hovaten;
        $data->gioitinh=$request->gioitinh;
        $data->sdt=$request->sdt;
        $data->cmnd=$request->cmnd;
        $data->ngaysinh=$request->ngaysinh;
        $data->diachi=$request->diachi;
        $data->email=$request->email;
        $data->tendangnhap=$request->tendangnhap;
        $data->status=$request->status;
        $data->password=bcrypt($request->password);

        if($data->save()){
            $data=khachhang::all();
            return view('admin.khachhang.index',compact('data'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\khachhang  $khachhang
     * @return \Illuminate\Http\Response
     */
    public function show(khachhang $khachhang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\khachhang  $khachhang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = khachhang::find($id);
        
		return view('admin.khachhang.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\khachhang  $khachhang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'hovaten.required' => 'Họ và tên không được bỏ trống',
            'gioitinh.required' => 'Giới tính không được bỏ trống',
            'ngaysinh.required' => 'Ngày sinh không được bỏ trống',
            'diachi.required' => 'Địa chỉ không được bỏ trống',
            'sdt.required' => 'Số điện thoại không được bỏ trống',
            'cmnd.required' => 'Chứng minh không được bỏ trống',
            'tendangnhap.required' => 'Tên đăng nhập không được bỏ trống',
           
            'email.required' => 'email không được bỏ trống',
            'email.email' => 'email phải đúng định dạng',
        ];

        $request->validate([
            'hovaten'=>'required|max:100',
            'gioitinh'=>'required|numeric',
            'diachi'=>'required|max:100',
            'sdt'=>'required|numeric',
            'cmnd'=>'required|numeric|unique:nhanvien,cmnd,'.$id,
            'tendangnhap'=>'required|max:100|unique:nhanvien,tendangnhap,'.$id,
            'email'=>'required|email|max:100|unique:nhanvien,email,'.$id,
        ],$messages);
        
        $data = khachhang::find($id);
        $data->hovaten=$request->hovaten;
        $data->gioitinh=$request->gioitinh;
        $data->sdt=$request->sdt;
        $data->cmnd=$request->cmnd;
        $data->ngaysinh=$request->ngaysinh;
        $data->diachi=$request->diachi;
        $data->email=$request->email;
        $data->tendangnhap=$request->tendangnhap;
        if($request->password!=null){
            $data->password=bcrypt($request->password);
        }
        $data->status=$request->status;
        if($data->save()){
            $data=khachhang::all();
            return view('admin.khachhang.index',compact('data'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\khachhang  $khachhang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        khachhang::find($id)->delete();

        return redirect('admin/khachhang');
        
    }
}
