<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class khachhang extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table='khachhang';
    public $timestamps = false;
    protected $fillable = [
        'tendangnhap',
        'email',
        'password',
        'hovaten',
        'ngaysinh',
        'gioitinh',
        'diachi',
        'sdt',
        'cmnd',
        'status',
        'token',
        'anh',

    ];
    public function dathang(){
        return $this->hasMany(dathang::class,'id','khachhang_id');
    }
    public function scopeSearch($query){
        if($tukhoa=request()->tukhoa){
          $query=$query->where('hovaten','like','%'.$tukhoa.'%');
        }
        return $query;
  
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
