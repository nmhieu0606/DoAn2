@extends('layouts.site')
@section('main')
<div class="main_content">
    <div class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="text-center order_complete">
                        <i class="fas fa-check-circle"></i>
                        <div class="heading_s1">
                            <h3>Đặt hàng thành công!</h3>
                        </div>
                        <p>Vui lòng check email {{Auth::guard('khachhang')->user()->email}}</p>
                        <a href="{{route('home.index')}}" class="btn btn-fill-out">Tiếp tục mua hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
       
@endsection