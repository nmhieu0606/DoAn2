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
            return $next($request);
        }
        else{
            return redirect('/dangnhap')->with('error','Bạn cần đăng nhập');
        }
        
       
       
    }
}
