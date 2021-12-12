
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng nhập</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.min.css">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{url('public/login')}}/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/login')}}/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/login')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/login')}}/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/login')}}/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{url('public/login')}}/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/login')}}/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/login')}}/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{url('public/login')}}/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('public/login')}}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{url('public/login')}}/css/main.css">
<!--===============================================================================================-->
<style>
video {
   width: 100vw;
   height: 100vh;
   position: fixed;
   top: 0;
   left: 0;
   object-fit: cover;
 }
 .noi_dung {
   position: relative;
   height: 100vh;
   /* text-align: center; */
   display: flex;
   align-items: center;
   justify-content: center;
 }
 h1 {
   color: CornflowerBlue;
   text-transform: uppercase;
   letter-spacing: 1vw;
   line-height: 1.2;
   font-size: 3vw;
   /* text-align: center; */
 }

</style>
</head>
<body>
	
	<video playsinline autoplay muted loop>
		<source src="{{url('public/video.mp4')}}" type="video/mp4">
	</video>
	  <header class="noi_dung">
		<div class="limiter">
			<div class="container-login100" >
				<div class="wrap-login100 p-t-30 p-b-50">
					
					<form id="form-login" action="{{route('post.dangnhap')}}" method="POST" class="login100-form validate-form p-b-33 p-t-5">
			  @csrf
						<div class="wrap-input100 validate-input" data-validate = "Nhập Tên đăng nhập">
							<input required class="input100" type="text" name="tendangnhap" placeholder="Tên đăng nhập">
							<span class="focus-input100" data-placeholder="&#xe82a;"></span>
						</div>
		
						<div class="wrap-input100 validate-input" data-validate="Nhập Mật khẩu">
							<input required class="input100" type="password" name="password" placeholder="Mật khẩu">
							<span class="focus-input100" data-placeholder="&#xe80f;"></span>
						</div>
		
						<div class="container-login100-form-btn m-t-32">
							<button type="submit" class="login100-form-btn">
								Login
							</button>
						</div>
		
					</form>
				</div>
			</div>
		</div>
	</header>
	
 
	<div id="dropDownSelect1"></div>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.all.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('public/login')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('public/login')}}/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('public/login')}}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{url('public/login')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('public/login')}}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{url('public/login')}}/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{url('public/login')}}/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="{{url('public/login')}}/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="{{url('public/login')}}/js/main.js"></script>
  <script>
    $('#form-login').on('submit',function(e){
      e.preventDefault();
      var action=$(this).attr('action');
      var data= $(this).serialize();
      $.post(action,data,function(res){
          if(res.code==1){
            location.replace("{{route('admin.index')}}");
          }
          else{
              Swal.fire({
              position: 'center',
              icon: 'error',
              title: 'Tên đăng nhập hoặc mật khẩu sai',
              showConfirmButton: false,
              timer: 1500
            })
          }
      })
    })
  </script>

</body>
</html>