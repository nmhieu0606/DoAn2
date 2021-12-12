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
Route::get('/dropdown','home_controller@dropdown')->name('home.dropdown');
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

Route::post('/dangnhap/index','home_controller@post_dangnhap')->name('home.postdangnhap');
Route::get('/chitiet/{id}','home_controller@chitiet')->name('home.chitiet');

Route::get('/themgiohang/{id}','giohang_controller@themgiohang')->name('home.themgiohang');
Route::get('/giohang','giohang_controller@index')->name('giohang.index');
Route::get('/giohang/view','giohang_controller@view')->name('giohang.view');
Route::get('/giohang/capnhat/tang/{id}','giohang_controller@capnhat_tang')->name('giohang.capnhat_tang');
Route::get('/giohang/capnhat/giam/{id}','giohang_controller@capnhat_giam')->name('giohang.capnhat_giam');
Route::get('/giohang/xoa/{id}','giohang_controller@xoa')->name('giohang.xoa');
Route::get('/giohang/xoatatca','giohang_controller@xoatatca')->name('giohang.xoatatca');

Route::get('/giohang/xacnhan','dathang_controller@create')->name('get_dathang');
Route::post('/giohang/xacnhan','dathang_controller@store')->name('post_dathang');
Route::get('/giohang/completed','dathang_controller@completed')->name('dathang.completed');
Route::get('/donhang','dathang_controller@getdonhang')->name('get.donhang');
Route::get('/donhang-kiemtra','dathang_controller@kiemtra_donhang')->name('get.kiemtra_donhang');
Route::get('/donhang_chitiet/{id}','dathang_controller@getchitiet_donhang')->name('get.chitiet_donhang');
Route::post('/donhang_chitiet/huydonhang/{id}','dathang_controller@huydonhang')->name('get.huydonhang');


Route::get('admin/dangnhap','nhanvien_controller@getdangnhap')->name('get.dangnhap');
Route::post('admin/dangnhap','nhanvien_controller@postdangnhap')->name('post.dangnhap');
Route::get('admin/dangxuat','nhanvien_controller@dangxuat')->name('dangxuat');
Route::get('admin/error','admin_controller@error')->name('admin.error');

Route::group(['prefix'=>'khachhang','middleware'=>'khlogin'],function(){
    Route::get('/taikhoan','home_controller@taikhoan')->name('khachhang.taikhoan');
    Route::post('/taikhoan','home_controller@update')->name('taikhoan.update');
    Route::get('/dangxuat/index','home_controller@dangxuat')->name('khachhang.dangxuat');
    Route::get('/doimatkhau','home_controller@doimatkhau')->name('khachhang.doimatkhau');
    Route::post('/doimatkhau','home_controller@postdoimatkhau')->name('khachhang.postdoimatkhau');

});

Route::group(['prefix'=>'ajax'],function(){
    Route::post('/dangnhap','ajax_controller@dangnhap')->name('ajax.dangnhap');
    Route::post('/comment/{sanpham_id}','ajax_controller@binhluan')->name('ajax.comment');
});

Route::group(['prefix'=>'admin','middleware'=>'adminlogin'],function(){
    Route::get('/', 'admin_controller@index')->name('admin.index');
    Route::get('/danhthu/index', 'admin_controller@danhthu')->name('admin.danhthu');
    Route::get('/donhang', 'donhang_controller@index')->name('donhang.index');
    Route::get('/donhang/show/{id}', 'donhang_controller@show')->name('donhang.show');
    Route::get('/donhang/destroy/{id}', 'donhang_controller@destroy')->name('donhang.destroy');
    Route::get('/donhang/nhandon/{id}', 'donhang_controller@nhandon')->name('donhang.nhandon');
    Route::get('/donhang/tinhtrang/{id}/{tt}', 'donhang_controller@tinhtrang')->name('donhang.tinhtrang');

    Route::post('/sanpham/nhap-excel','sanpham_controller@postnhap')->name('excel.nhap');
    Route::get('/sanpham/xuat-excel','sanpham_controller@getxuat')->name('excel.xuat');
    Route::get('/sanpham/delete/{id}','sanpham_controller@delete')->name('sanpham.delete');

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
        'slide'=>'slide_controller',
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

