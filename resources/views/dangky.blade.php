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
                                <h3>Đăng ký tài khoản</h3>
                            </div>
                            <form action="{{route('home.postdangky')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" required="" class="form-control" name="hovaten" placeholder="Họ và tên">
                                </div>
                                <div class="form-group">
                                    <select name="gioitinh" class="form-select" aria-label="Default select example">
                                       
                                        <option selected value="0">Nam</option>
                                        <option value="1">Nữ</option>
                                        
                                      </select>
                                </div>
                                <div class="form-group">
                                    <input type="number" required="" class="form-control" name="sdt" placeholder="Số điện thoại">
                                </div>
                                <div class="form-group">
                                    <input type="text" required="" class="form-control" name="diachi" placeholder="Địa chỉ">
                                </div>
                                <div class="form-group">
                                    <input type="text" required="" class="form-control" name="cmnd" placeholder="CMND">
                                </div>
                                <div class="form-group">
                                    <input type="date" required="" class="form-control" name="ngaysinh" placeholder="Ngày sinh">
                                </div>
                              
                                <div class="form-group">
                                    <input type="text" required="" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" required="" class="form-control" name="tendangnhap" placeholder="Tên đăng nhập">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" required="" type="password" name="password" placeholder="Password">
                                </div>
                                {{-- <div class="form-group">
                                    <input class="form-control" required="" type="password" name="password" placeholder="Confirm Password">
                                </div> --}}
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">
                                            <label class="form-check-label" for="exampleCheckbox2"><span>I agree to terms &amp; Policy.</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-fill-out btn-block" name="register">Register</button>
                                </div>
                            </form>
                            <div class="different_login">
                                <span> or</span>
                            </div>
                            <ul class="btn-login list_none text-center">
                                <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                                <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                            </ul>
                            <div class="form-note text-center">Already have an account? <a href="login.html">Log in</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
   
   