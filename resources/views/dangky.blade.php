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
                            <div id="form-dk-error">

                            </div>
                            <form id="form-dangky"  method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" required="" class="form-control" id="hovaten" name="hovaten" placeholder="Họ và tên">
                                </div>
                                <div class="form-group">
                                    <select id="gioitinh" name="gioitinh" class="form-select" aria-label="Default select example">
                                       
                                        <option selected value="0">Nam</option>
                                        <option value="1">Nữ</option>
                                        
                                      </select>
                                </div>
                                <div class="form-group">
                                    <input id="sdt" type="number" required="" class="form-control" name="sdt" placeholder="Số điện thoại">
                                </div>
                                <div class="form-group">
                                    <input id="diachi" type="text" required="" class="form-control" name="diachi" placeholder="Địa chỉ">
                                </div>
                                <div class="form-group">
                                    <input id="cmnd" type="text" required="" class="form-control" name="cmnd" placeholder="CMND">
                                </div>
                                <div class="form-group">
                                    <input id="ngaysinh" type="date" required="" class="form-control" name="ngaysinh" placeholder="Ngày sinh">
                                </div>
                              
                                <div class="form-group">
                                    <input id="email" type="text" required="" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input id="tendangnhap" type="text" required="" class="form-control" name="tendangnhap" placeholder="Tên đăng nhập">
                                </div>
                                <div class="form-group">
                                    <input id="password" class="form-control" required="" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input id="password_c" class="form-control" required="" type="password" name="password_c" placeholder="Confirm Password">
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">
                                            <label class="form-check-label" for="exampleCheckbox2"><span>I agree to terms &amp; Policy.</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button id="btn-dangky" type="submit" class="btn btn-fill-out btn-block" >Đăng kí</button>
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
@section('js')

<script>
    $(document).ready(function () {
        $('#form-dangky').on('submit', function(ev) {
            ev.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{route('home.postdangky')}}",
                data: new FormData(this),
                dataType: 'JSON',
                contentType:false,
                cache:false,
                processData:false,
               
                success: function (response) {
                    if(response.error){
                        
                        var _html_loi='<div class="alert alert-danger" role="alert"><button class="close" data-bs-dismiss="alert" aria-hidden="true">&times;</button>';
                        for(let error1 of response.error){
                            _html_loi+=` <li>${error1}</li>`;
                        }
                        _html_loi+='</div>';
                        $('#form-dk-error').html(_html_loi);

                    }
                    if(response==1){
                        alert('Bạn đã đăng kí thành công vui lòng check email để kích hoạt tài khoản')
                       
                        window.location.replace('{{route("home.getdangnhap")}}')
                    }

                    
                    
                }
            });
        });


       
    })

</script>
    
@endsection
   
   