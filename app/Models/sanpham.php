<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\xuatxu;
use App\Models\nhanhieu;
use App\Models\baohanh;
use App\Models\danhmuc;

class sanpham extends Model
{
    use HasFactory;
    protected $table='sanpham';
    public $timestamps = false;
    protected $fillable = [
		'id', 'tensp', 'anh','soluong', 'chitiet', 'gianhap', 'giaxuat','nhanhieu_id','xuatxu_id', 'baohanh_id','danhmuc_id'
	];
    public function dathang_chitiet(){
    return $this->hasMany(dathang_chitiet::class,'sanpham_id','id');
    }

    public function xuatxu(){
      return $this->hasOne(xuatxu::class,'id','xuatxu_id');
    }
    public function nhanhieu(){
      return $this->hasOne(nhanhieu::class,'id','nhanhieu_id');
    }
    public function baohanh(){
      return $this->hasOne(baohanh::class,'id','baohanh_id');
    }
    public function danhmuc(){
      return $this->hasOne(danhmuc::class,'id','danhmuc_id');
    }
    public function comment(){
      return $this->hasMany(comment::class,'sanpham_id','id')->where('reply_id',0)->orderBy('created_at','DESC');
    }

    public function scopeSearch($query){
      if($tukhoa=request()->tukhoa){
        $query=$query->where('tensp','like','%'.$tukhoa.'%');
      }
      return $query;

    }
}
