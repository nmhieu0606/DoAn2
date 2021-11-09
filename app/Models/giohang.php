<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class giohang extends Model
{
    use HasFactory;
    public $sanpham=0;
    public $soluong=0;
    public $dongia=0;
    public function __construct($giohang)
    {
        if($giohang){
            $this->sanpham=$giohang->sanpham;
            $this->soluong=$giohang->soluong;
            $this->dongia=$giohang->dongia;
        }
    }
    public function themgiohang($sanpham,$id){
        $spmoi=['sp'=>0,'giaxuat'=>$sanpham->giaxuat,'sanpham_thongtin'=>$sanpham];
        if($this->sanpham){
            if(array_key_exists($id,$sanpham)){
                $spmoi=$sanpham[$id];
            }

        }
        $spmoi['sp']++;
        $spmoi['giaxuat']=$spmoi['sp']*$sanpham->giaxuat;
        $this->sanpham[$id]=$spmoi;
        $this->dongia+=$sanpham->giaxuat;
        $this->soluong++;

    }
    
    
}
