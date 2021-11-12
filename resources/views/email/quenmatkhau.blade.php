<div style="width: 600px; margin: 0 auto;">
    <div style="text-align: center;">
        <h2>Xin chào {{$kh->hovaten}}</h2>
        <h3>Bạn quên mật khẩu vui lòng nhập ấn vào link để cập nhật mật khẩu mới</h3>
        <h3>Tên đăng nhập của bạn là: {{$kh->tendangnhap}}</h3>
        <p>
            <a href="{{route('home.kichhoatmatkhau',['khachhang'=>$kh->id,'token'=>$kh->token])}}" style="display: inline-block;background-color: green;color:#fff;padding: 7px 25px; font-weight: bold">
                Đặt lại mật khẩu
            </a>
        </p>
    
    </div>
</div>