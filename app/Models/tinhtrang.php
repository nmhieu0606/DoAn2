<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tinhtrang extends Model
{
    use HasFactory;
    protected $table='tinhtrang';
    public $timestamps=false;
    public function dathang(){
      return $this->hasMany(dathang::class,'tinhtrang_id','id');
  }
    public function scopeSearch($query){
        if($tukhoa=request()->tukhoa){
          $query=$query->where('tinhtrang','like','%'.$tukhoa.'%');
        }
        return $query;
  
    }
}
