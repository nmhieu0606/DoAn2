<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class nhanvien extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table='nhanvien';
    public $timestamps=false;
    protected $fillable = [
        'tendangnhap',
        'email',
        'password',
    ];
    public function chucvu(){
        return $this->hasOne(chucvu::class,'id','chucvu_id');
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
    public function has_permisstion($route){
        $routes=$this->route();
        return in_array($route,$routes)?true:false;
    }
    public function route(){
        $r=$this->getroute();
        foreach($r as $ro){
            var_dump($ro->tenchucvu);
        }
       
        return ['danhmuc.index','admin.index'];
    }
    public function getroute(){
        return $this->hasMany(chucvu::class,'id','chucvu_id');
    }
}
