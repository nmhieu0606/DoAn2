<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dathang;
use App\Models\sanpham;
use App\Models\dathang_chitiet;
use App\Models\khachhang;
use App\Models\tinhtrang;
use Illuminate\Support\Facades\Auth;
use PDF;

class donhang_controller extends Controller
{
    public function index(){
        $tinhtrang=tinhtrang::all();
        $data=dathang::orderby('id','DESC')->paginate(10);
<<<<<<< HEAD
        return view('admin.donhang.index',compact('data','tinhtrang'));
=======
        $dhct=dathang_chitiet::search()->paginate(10);
        $kh=khachhang::search()->paginate(5);
        $sp=sanpham::all();
        return view('admin.donhang.index',compact('data','sp','dhct','kh'));
>>>>>>> 3d04f43d0b589746ab72a489aa4188f0adc3fa0d

    }
    public function edit($id){
        $data=dathang::find($id);
        return view('admin.donhang.edit',compact('data'));

    }
    public function nhandon($id){
        $data=dathang::find($id);
        $data->nhanvien_id=Auth::user()->id;
        $data->save();
        return redirect()->back();

    }
    public function tinhtrang($id,$tt){
       
        $data=dathang::find($id);
        $data->tinhtrang_id=$tt;
        $data->save();
        return redirect('admin/donhang');
    }
    public function show($id){
        
        $dh=dathang::find($id);
        $tinhtrang=tinhtrang::all();
        if(request('pdf',false)){
            $pdf=PDF::loadView('admin.pdf.donhang_chitiet',compact('dh','tinhtrang'));
            return $pdf->stream('invoice.pdf');
        }
       
        

        return view('admin.donhang.show',compact('dh','tinhtrang'));
    }
    public function destroy($id){
        
        $data=dathang_chitiet::where('dathang_id',$id)->delete();
    
            dathang::find($id)->delete();
            return redirect()->back();
        
    }
   
}
