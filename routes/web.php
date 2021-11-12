<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\danhmuc_controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','home_controller@index')->name('home.index');
Route::get('/dangky/index','home_controller@getdangky')->name('home.getdangky');
Route::post('/dangky/index','home_controller@postdangky')->name('home.postdangky');
Route::get('/dangky/kichhoat/{khachhang}/{token}','home_controller@kichhoat')->name('home.kichhoat');

Route::get('/quenmatkhau/index','home_controller@quenmatkhau')->name('home.quenmatkhau');
Route::post('/quenmatkhau/index','home_controller@postquenmatkhau')->name('home.postquenmatkhau');
Route::get('/quenmatkhau/kichhoatmatkhau/{khachhang}/{token}','home_controller@kichhoatmatkhau')->name('home.kichhoatmatkhau');
Route::post('/quenmatkhau/laylaimatkhau/{khachhang}/{token}','home_controller@laylaimatkhau')->name('home.laylaimatkhau');

Route::get('/shop','home_controller@shop')->name('home.shop');
Route::get('/danhmuc/{slug}','home_controller@show')->name('home.show');

Route::get('/dangnhap/index','home_controller@get_dangnhap')->name('home.getdangnhap');
Route::get('/dangxuat/index','home_controller@dangxuat')->name('home.dangxuat');
Route::post('/dangnhap/index','home_controller@post_dangnhap')->name('home.postdangnhap');
Route::get('/chitiet/{id}','home_controller@chitiet')->name('home.chitiet');

Route::get('/themgiohang/{id}','giohang_controller@themgiohang')->name('home.themgiohang');
Route::get('/giohang','giohang_controller@index')->name('giohang.index');
Route::get('/giohang/capnhat/{id}','giohang_controller@capnhat')->name('giohang.capnhattang');
Route::get('/giohang/xoa/{id}','giohang_controller@xoa')->name('giohang.xoa');
Route::get('/giohang/xoatatca','giohang_controller@xoatatca')->name('giohang.xoatatca');

Route::get('/giohang/xacnhan','dathang_controller@create')->name('get_dathang');
Route::post('/giohang/xacnhan','dathang_controller@store')->name('post_dathang');
Route::get('/giohang/completed','dathang_controller@completed')->name('dathang.completed');
Route::get('/donhang','dathang_controller@getdonhang')->name('get.donhang');
Route::get('/donhang_chitiet/{id}','dathang_controller@getchitiet_donhang')->name('get.chitiet_donhang');
Route::post('/donhang_chitiet/huydonhang/{id}','dathang_controller@huydonhang')->name('get.huydonhang');


Route::get('admin/dangnhap','nhanvien_controller@getdangnhap')->name('get.dangnhap');
Route::post('admin/dangnhap','nhanvien_controller@postdangnhap')->name('post.dangnhap');
Route::get('admin/dangxuat','nhanvien_controller@dangxuat')->name('dangxuat');
Route::get('admin/error','admin_controller@error')->name('admin.error');

Route::group(['prefix'=>'admin','middleware'=>'adminlogin'],function(){
    Route::get('/', 'admin_controller@index')->name('admin.index');
    Route::get('/donhang', 'donhang_controller@index')->name('donhang.index');
    Route::get('/donhang/show/{id}', 'donhang_controller@show')->name('donhang.show');
    Route::get('/donhang/destroy/{id}', 'donhang_controller@destroy')->name('donhang.destroy');
    Route::get('/donhang/nhandon/{id}', 'donhang_controller@nhandon')->name('donhang.nhandon');
    Route::get('/donhang/tinhtrang/{id}/{tt}', 'donhang_controller@tinhtrang')->name('donhang.tinhtrang');
    Route::resources([
        'danhmuc'=>'danhmuc_controller',
        'khachhang'=>'khachhang_controller',
        'nhanhieu'=>'nhanhieu_controller',
        'xuatxu'=>'xuatxu_controller',
        'sanpham'=>'sanpham_controller',
        'baohanh'=>'baohanh_controller',
        'chucvu'=>'chucvu_controller',
        'nhanvien'=>'nhanvien_controller',
        'tinhtrang'=>'tinhtrang_controller',
    ]);
});

/*Route::prefix('admin')->group(function () {
    Route::get('/', 'admin_controller@index')->name('admin.index');
    Route::resources([
        'danhmuc'=>'danhmuc_controller',
        'khachhang'=>'khachhang_controller',
        'nhanhieu'=>'nhanhieu_controller',
        'xuatxu'=>'xuatxu_controller',
        'sanpham'=>'sanpham_controller',
        'baohanh'=>'baohanh_controller',
        'chucvu'=>'chucvu_controller',
        'nhanvien'=>'nhanvien_controller'
    ]);
}); 
*/

