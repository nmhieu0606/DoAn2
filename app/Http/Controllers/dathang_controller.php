<?php

namespace App\Http\Controllers;

use App\Models\dathang;
use App\Models\sanpham;
use App\Models\dathang_chitiet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\mail;
use Carbon\Carbon;
use App\Helper\giohang;
use App\Mail\dathang_email;
use App\Models\khachhang;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\LookupRef\Offset;
use PhpOffice\PhpSpreadsheet\Calculation\TextData\Search;

use function PHPUnit\Framework\returnSelf;

class dathang_controller extends Controller
{
    public function __construct()
    {
        $this->middleware('khlogin');
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        
        return view('dathang');
    }
    public function postemail(Request $request)
    {
       
        
    }
    public function kiemtra_donhang(giohang $giohang){
        if($giohang->items!=null){

            if($this->kiemtra($giohang)){
                return response()->json([
                    'data'=>$giohang,
                ]);
            }
            else{      
                $error='';
                foreach($giohang->items as $sanpham_id=>$item){
                    $sp=sanpham::find($sanpham_id);
                    if($item['soluong']>$sp->soluong){
                        $error.='Số lượng sản phẩm '.$sp->tensp.' chỉ còn '.$sp->soluong.'<br>';
                    }
                }
                return response()->json([
                    'error'=>$error,
                ]);
            } 

        }
        else{
            return response()->json([
                'error'=>'Đơn hàng trống',
            ]);
        }
       
    }
    public function getdonhang(){
        $id=Auth::guard('khachhang')->user()->id;
        $data=dathang::where('khachhang_id', $id)->orderby('id','DESC')->get();
        return view('donhangcuatoi',compact('data'));
        

    }
    public function getchitiet_donhang($id){
        $data=dathang_chitiet::where('dathang_id',$id)->orderby('dathang_id','DESC')->get();
        $dathang=dathang::find($id);
       return view('donhang_chitiet',compact('data','dathang'));

    }
    public function huydonhang(Request $request,$id){
        $dathang=dathang::find($id);
        $dathang->tinhtrang_id=$request->tinhtrang_id;
        if($dathang->save()){
            $dathang_chitiet=dathang_chitiet::where('dathang_id',$id)->get();
            foreach($dathang_chitiet as $d){
                $sanpham=sanpham::find($d);
                foreach($sanpham as $sp){
                   $sp->soluong+=$d->soluong;
                   $sp->save();
                }
            }
        }
        return redirect('/donhang');
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dathang');
    }
    public function completed()
    {
        return view('completed');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,giohang $giohang)
    {  
        $id=Auth::guard('khachhang')->user()->id;
        $dathang=new dathang;
        $dathang->khachhang_id=$id;
        $dathang->tinhtrang_id=1;
        $dathang->ngaydathang=Carbon::now();
        $dathang->tongtien=$giohang->gia;
        if($dathang->save()){
            foreach($giohang->items as $sanpham_id=>$item){
                $gia=$item['gia'];
                $soluong=$item['soluong'];
                $dathang_chitiet=new dathang_chitiet;
                $dathang_chitiet->dathang_id=$dathang->id;
                $dathang_chitiet->sanpham_id=$sanpham_id;
                $sp=sanpham::find($sanpham_id);
                if($sp->soluong>=$soluong){
                    $sp->soluong-=$soluong;
                    $sp->save();
                    $dathang_chitiet->soluong=$soluong;
                    $dathang_chitiet->dongia=$gia*$soluong;
                    $dathang_chitiet->save();
                }
                else{
                    $xoadathang=dathang::find($dathang->id);
                    $xoadathang->delete();
                    return redirect('/giohang')->with('no','số lượng sản phẩm: '.$sp->tensp.' số lượng chỉ còn '.$sp->soluong.'');
                }
            }
            $kh=Auth::guard('khachhang')->user();
            Mail::send('email.donhang',compact('kh'),function($email) use($kh){
                $email->subject('ShopMobile - Đặt hàng thành công');
                $email->to($kh->email,$kh->hovaten);
            });
        

            session()->forget('giohang');
            return redirect('/giohang/completed');
        } 

    }
    public function kiemtra(giohang $giohang){
        $tam=false;
        foreach($giohang->items as $sanpham_id=>$item){
            $sp=sanpham::find($sanpham_id);
            if($item['soluong']<=$sp->soluong){
                return $tam=true;
            }
            else
                return $tam=false;
        }
        return $tam;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dathang  $dathang
     * @return \Illuminate\Http\Response
     */
    public function show(dathang $dathang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dathang  $dathang
     * @return \Illuminate\Http\Response
     */
    public function edit(dathang $dathang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dathang  $dathang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dathang $dathang)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dathang  $dathang
     * @return \Illuminate\Http\Response
     */
    public function destroy(dathang $dathang)
    {
        //
    }
}
