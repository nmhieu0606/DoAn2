<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table='danhmuc';
    protected $fillable=['tendanhmuc','parent_id'];
    public function child(){
        return $this->hasMany(danhmuc::class,'parent_id','id');
    }
    public function scopeSearch($query){
        if($tukhoa=request()->tukhoa){
          $query=$query->where('tendanhmuc','like','%'.$tukhoa.'%');
        }
        return $query;
  
    }

    public function sanpham(){
        return $this->hasMany(sanpham::class,'danhmuc_id','id');
    }
}
