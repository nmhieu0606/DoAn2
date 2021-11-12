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
                                <form action="{{route('home.postquenmatkhau')}}" method="post">
                                  @csrf
                                    <div class="form-group">
                                        <input type="email" required="" class="form-control" name="email" placeholder="Nhập email để lấy lại mật khẩu">
                                        {{$errors->first('email')}}
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-fill-out btn-block">Quên mật khẩu</button>
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