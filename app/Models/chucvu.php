<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chucvu extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table='chucvu';
    protected $fillable=['id','tenchucvu','quyen'];
    public function nhanvien(){
        return $this->hasMany(nhanvien::class,'nhanvien_id','id');
    }
}
