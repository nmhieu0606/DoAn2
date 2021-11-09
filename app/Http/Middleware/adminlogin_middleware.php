<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminlogin_middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){

                $user=Auth::user();
                $route=$request->route()->getName();
                if($user->cant($route)){
                    return redirect()->route('admin.error',['code'=>403]);
                }
                return $next($request);
               
               

        }
        else
            return redirect('admin/dangnhap');

    }
}
