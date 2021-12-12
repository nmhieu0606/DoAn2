<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\nhanvien;
class slide extends Model
{
    use HasFactory;
    protected $table='slide';
    public $timestamps=false;
    protected $fillable=[
        'ten',
        'anh',
        'nhanvien_id',
        'status',
    ];
    public function nhanvien(){
        return $this->hasOne(nhanvien::class,'id','nhanvien_id');
    }
}
