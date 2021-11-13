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
                                    <h3>Đổi mật khẩu</h3>
                                </div>
                                <form action="{{route('khachhang.postdoimatkhau')}}" method="POST">
                                  @csrf
                                
                                    <div class="form-group">
                                        <input class="form-control" required type="password" name="password_cu" placeholder="Nhập mật khẩu cũ">
                                    </div>
                                    
                                    <div class="form-group">
                                        <input class="form-control" required type="password" name="password_moi" placeholder="Mật khẩu mới">
                                        {{$errors->first('password_moi')}}
                                    </div>
                                    
                                    <div class="form-group">
                                        <input class="form-control" required type="password" name="password_xacnhan" placeholder="Xác nhận Mật khẩu">
                                        {{$errors->first('password_xacnhan')}}
                                    </div>

                                    <div class="login_footer form-group">
                                        <a href="{{route('home.quenmatkhau')}}">Quên mật khẩu?</a>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-fill-out btn-block" >Đổi mật khẩu</button>
                                    </div>
                                </form>
                                <div class="different_login">
                                    <span> or</span>
                                </div>
                                <ul class="btn-login list_none text-center">
                                    <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                                    <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                                </ul>
                                <div class="form-note text-center">Don't Have an Account? <a href="signup.html">Sign up now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection