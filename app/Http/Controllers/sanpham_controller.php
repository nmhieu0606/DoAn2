<?php

namespace App\Http\Controllers;

use App\Models\sanpham;
use App\Models\nhanhieu;
use App\Models\xuatxu;
use App\Models\baohanh;
use App\Models\danhmuc;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use File;

class sanpham_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data=sanpham::search()->paginate(10);
        
        return view('admin.sanpham.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nhanhieu=nhanhieu::all();
        $xuatxu=xuatxu::all();
        $baohanh=baohanh::all();
        $danhmuc=danhmuc::all();
        return view('admin.sanpham.create',compact('nhanhieu','xuatxu','baohanh','danhmuc'));
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
            'tensp.required' => 'Tên sản phẩm không được bỏ trống',
            'soluong.required' => 'Số lượng không được bỏ trống',
            'gianhap.required' => 'Giá nhập không được bỏ trống',
            'giaxuat.required' => 'Giá xuất không được bỏ trống',
            'nhanhieu_id.required' => 'Nhãn hiệu không được bỏ trống',
            'xuatxu_id.required' => 'Xuất xứ không được bỏ trống',
            'baohanh_id.required' => 'Bảo hành không được bỏ trống',
            'danhmuc_id.required' => 'Danh mục không được bỏ trống',

        ];
        $request->validate([
            'tensp'=>'required|max:100',
            'soluong'=>'required|numeric',
            'gianhap'=>'required|numeric',
            'giaxuat'=>'required|numeric',
            'nhanhieu_id'=>'required|numeric',
            'xuatxu_id'=>'required|numeric',
            'baohanh_id'=>'required|numeric',
            'danhmuc_id'=>'required|numeric',

        ],$messages);
        if($request->has('file_uploads')){
            $file=$request->file_uploads;
            $ex=$request->file_uploads->extension();
            $file_name=time().'-sanpham'.'.'.$ex;
            $file->move(public_path('uploads'),$file_name);
          
        }
        $request->merge(['anh'=>$file_name]);
        if(sanpham::create($request->all())){
            return redirect('admin/sanpham');
        }
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function show(sanpham $sanpham)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nhanhieu=nhanhieu::all();
        $xuatxu=xuatxu::all();
        $baohanh=baohanh::all();
        $danhmuc=danhmuc::all();
        $data=sanpham::find($id);
        return view('admin.sanpham.edit',compact('data','nhanhieu','xuatxu','baohanh','danhmuc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->has('file_uploads')){
            $file=$request->file_uploads;
            $ex=$request->file_uploads->extension();
            $file_name=time().'-sanpham'.'.'.$ex;
            $file->move(public_path('uploads'),$file_name);

            $data=sanpham::find($id);
            File::delete('public/uploads/'.$data->anh);
            $request->merge(['anh'=>$file_name]);
        }
        
        if(sanpham::find($id)->update($request->all())){
            return redirect('admin/sanpham');
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sanpham  $sanpham
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if( sanpham::find($id)->dathang_chitiet->count()){
            return redirect()->route('sanpham.index')->with('error','không thể xóa sản phẩm vì sản phẩm có trong đơn hàng');
        }
        else{
            $data=sanpham::find($id);
            $duongdan = 'public/uploads';
            File::delete($duongdan.'/'.$data->anh);
            $data->delete();
            return redirect()->route('sanpham.index')->with('success','Xóa sản phẩm thành công');
        }
    }
}
