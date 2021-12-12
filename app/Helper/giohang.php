<?php

namespace App\Helper;
class giohang{

    public $items=[];
    public $soluong=0;
    public $gia=0;
    public function __construct()
    {
        $this->items=session('giohang')?session('giohang'):[];
        $this->soluong=$this->get_soluong();
        $this->gia=$this->get_gia();

    }
    public function them($sanpham,$soluong=1){
        $item=[
            'id'=>$sanpham->id,
            'tensp'=>$sanpham->tensp,
            'gia'=>$sanpham->giasale,
            'anh'=>$sanpham->anh,
            'soluong'=>$soluong,  
        ];
        if(isset($this->items[$sanpham->id])){
            $this->items[$sanpham->id]['soluong']+=$soluong;
        }
        else{
            $this->items[$sanpham->id]=$item;
        }
        
        session(['giohang'=>$this->items]);

    }
    public function xoa($id){
        if(isset($this->items[$id])){
           unset($this->items[$id]);
        }
        session(['giohang'=>$this->items]);


    }
    public function capnhat($id,$soluong){
     
        if($this->items[$id]){
            $this->items[$id]['soluong']=$soluong;
        }
        session(['giohang'=>$this->items]);

    }
    public function capnhat_tang($id){
     
        if($this->items[$id]){
            $this->items[$id]['soluong']+=1;
        }
        session(['giohang'=>$this->items]);

    }
    public function capnhat_giam($id){
     
        if($this->items[$id]){
            $this->items[$id]['soluong']-=1;
            if($this->items[$id]['soluong']==0){
                unset($this->items[$id]);
            }
        }
       
        session(['giohang'=>$this->items]);

    }
    public function xoatatca(){

        session()->forget('giohang');

    }
    private function get_gia(){
        $t=0;
        foreach($this->items as $it){
            $t+=$it['gia']*$it['soluong'];
        }
        return $t;
    }
    private function get_soluong(){
        $t=0;
        foreach($this->items as $it){
            $t+=$it['soluong'];
        }
        return $t;
       
    }














}








?>