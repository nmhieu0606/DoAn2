<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helper\giohang;
use App\Models\danhmuc;
use App\Models\sanpham;
use App\Models\dathang;
use App\Models\khachhang;
use App\Models\nhanvien;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        view()->composer('*',function($view){
            $view->with([
                'danhmuc'=>danhmuc::search()->paginate(10),
                'giohang'=>new giohang(),
                'sp'=>sanpham::search()->paginate(10),
                'sanpham_i'=>sanpham::orderBy('id','DESC')->paginate(10),
                'nv'=>nhanvien::all() 
            ]);

        });
    }
}
