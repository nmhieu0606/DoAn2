<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table='nhanvien';
    protected $fillable = [
        'tendangnhap',
        'email',
        'password',
    ];

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
        $data=[];
        foreach($this->get_route as $role ){
           $quyen=json_decode($role->quyen);
           foreach($quyen as $q){
              
               array_push($data,$q);
           }
        }
        return $data;
    }
    public function get_route(){
        return $this->hasMany(chucvu::class,'id','chucvu_id');
    }
}
