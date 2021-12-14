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
                                    <h3>Login</h3>
                                </div>
                                <form action="{{route('home.postdangnhap')}}" method="post">
                                  @csrf
                                    <div class="form-group">
                                        <input type="text" required="" class="form-control" name="tendangnhap" placeholder="Tên đăng nhập">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" required="" type="password" name="password" placeholder="Mật khẩu">
                                    </div>
                                    <div class="login_footer form-group">
                                        
                                        <a href="{{route('home.quenmatkhau')}}">Quên mật khẩu?</a>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-fill-out btn-block" name="login">Log in</button>
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