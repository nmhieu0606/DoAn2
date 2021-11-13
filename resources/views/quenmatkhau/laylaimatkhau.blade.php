@extends('layouts.site')
@section('main')
    <div class="main_content">
        <div class="login_register_wrap section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-md-10">
                        <div class="login_wrap">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h3>Quên  mật khẩu</h3>
                                </div>
                                <form action="{{route('home.laylaimatkhau',['khachhang'=>$kh,'token'=>$token])}}" method="post">
                                  @csrf
                                    <div class="form-group">
                                        <input type="password"  class="form-control" name="password" placeholder="Nhập mật khẩu mới">
                                        {{$errors->first('password')}}
                                    </div>
                                    <div class="form-group">
                                        <input type="password"  class="form-control" name="password_c" placeholder="Nhập lại mật khẩu">
                                        {{$errors->first('password_c')}}
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-fill-out btn-block">Đổi mật khẩu</button>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection