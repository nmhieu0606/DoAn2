<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class khachhang_middleware
{
    private $khachhang;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$guard='khachhang')
    {
        if(Auth::guard($guard)->check()){
            if(Auth::guard($guard)->user()->status==0){
                Auth::guard($guard)->logout();
                return redirect('/dangnhap/index')->with('no','Tài khoản chưa kích hoạt');
               
            }
            return $next($request);

        }
        
        else{
            return redirect('/dangnhap/index')->with('no','Vui lòng đăng nhập');
        }
        
       
       
    }
}
