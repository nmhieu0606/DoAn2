<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    
    protected $table='comment';
    protected $fillable=[
        'sanpham_id',
        'khachhang_id',
        'comment',
        'reply_id',
    ];
    public function khachhang(){
        return $this->hasOne(khachhang::class,'id','khachhang_id');
    }
    public function child_reply(){
        return $this->hasMany(comment::class,'reply_id','id')->orderBy('created_at','DESC');
    }
}
