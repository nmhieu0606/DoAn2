
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ShopMobile</title>
    <link rel="stylesheet" href="{{url('public/slider')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{url('public/slider')}}/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
	<link rel="stylesheet" href="{{url('public/slider')}}/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" href="{{url('public/shopwise')}}/assets/css/animate.css" />
    <link rel="stylesheet" href="{{url('public/shopwise')}}/assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" />
    <link rel="stylesheet" href="{{url('public/shopwise')}}/assets/css/all.min.css" />
    <link rel="stylesheet" href="{{url('public/shopwise')}}/assets/css/ionicons.min.css" />
    <link rel="stylesheet" href="{{url('public/shopwise')}}/assets/css/themify-icons.css" />
    <link rel="stylesheet" href="{{url('public/shopwise')}}/assets/css/linearicons.css" />
    <link rel="stylesheet" href="{{url('public/shopwise')}}/assets/css/flaticon.css" />
    <link rel="stylesheet" href="{{url('public/shopwise')}}/assets/css/simple-line-icons.css" />
    <link rel="stylesheet" href="{{url('public/shopwise')}}/assets/owlcarousel/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="{{url('public/shopwise')}}/assets/owlcarousel/css/owl.theme.css" />
    <link rel="stylesheet" href="{{url('public/shopwise')}}/assets/owlcarousel/css/owl.theme.default.min.css" />
    <link rel="stylesheet" href="{{url('public/shopwise')}}/assets/css/magnific-popup.css" />
    <link rel="stylesheet" href="{{url('public/shopwise')}}/assets/css/jquery-ui.css" />
    <link rel="stylesheet" href="{{url('public/shopwise')}}/assets/css/slick.css" />
    <link rel="stylesheet" href="{{url('public/shopwise')}}/assets/css/slick-theme.css" />
    <link rel="stylesheet" href="{{url('public/shopwise')}}/assets/css/style.css" />
    <link rel="stylesheet" href="{{url('public/shopwise')}}/assets/css/responsive.css" />
</head>
<body>
    
    <header  class="header_wrap fixed-top header_with_topbar">
        <div class="bottom_header dark_skin main_menu_uppercase">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="{{route('home.index')}}">
                        <img width="50px" src="{{url('public/uploads')}}/logo.jpg" alt="logo" />
                        <span>Mobile Store</span>
                        {{-- <img class="logo_dark" src="{{url('public/shopwise')}}/assets/images/logo_dark.png" alt="logo" /> --}}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false">
                        <span class="ion-android-menu"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li><a style="color: black;" class="nav-link nav_item" href="{{route('home.index')}}">Trang chủ</a></li>
                            <li class="dropdown dropdown-mega-menu">
                                <a style="color: black;" class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Danh mục sản phẩm</a>
                                <div class="dropdown-menu">
                                    <ul class="mega-menu d-lg-flex">
                                        <li class="mega-menu-col col-lg-3">
                                            <ul>
                                             @foreach ($danhmuc as $dt)
                                                <li><a class="dropdown-item nav-link nav_item" href="{{route('home.show',$dt->slug)}}">{{$dt->tendanhmuc}}</a></li>
                                                
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            @if (Auth::guard('khachhang')->check())
                            <li><a  style="color: black;" class="nav-link nav_item" href="{{route('get.donhang')}}">Đơn hàng của tôi</a></li>
                            @endif
                        </ul>
                    </div>
                    <ul  class="navbar-nav attr-nav align-items-center">
                        @if (!Auth::guard('khachhang')->check())
                        <li><a style="color: black;" class="nav-link nav_item" href="{{route('home.getdangnhap')}}">Đăng nhập</a></li>
                        <li><a style="color: black;" class="nav-link nav_item" href="{{route('home.getdangky')}}">Đăng Ký</a></li>
                        @endif
                        <li>
                            <form action="" class="form-inline">
  
                                    <li class="dropdown dropdown-mega-menu">
                                        
                                        <a style="color: black;" class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Tìm kiếm</a>
                                        <div class="dropdown-menu">
                                            <input type="search" class="form-control" id="input-search" placeholder="Nhập tên sản phẩm">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-3">
                                                    <ul>
                                                        <div class="search-ajax">

                                                        </div>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                            </form>
                        </li>
                        @if (Auth::guard('khachhang')->check())
                        <!-- Example single danger button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-silver btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <img style="width: 40px; border-radius:20px;" src="{{url('public/khachhang')}}/{{Auth::guard('khachhang')->user()->anh}}" alt="">
                                {{Auth::guard('khachhang')->user()->hovaten}}
                                </button>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('khachhang.taikhoan')}}">Thông tin</a></li>
                                <li><a class="dropdown-item" href="{{route('khachhang.doimatkhau')}}" >Đổi mật khẩu</a></li>
                                <li><a class="dropdown-item" href="{{route('khachhang.dangxuat')}}">Đăng xuất</a></li>
                                </ul>
                            </div>

                        @endif
                        
                        <li id="dropdown_item" class="dropdown cart_dropdown">
                          
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <div class="container">
        @if(Session::has('yes'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{Session::get('yes')}} 

        </div>
        @endif
        @if(Session::has('no'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{Session::get('no')}} 
        </div>
        @endif
    </div>
   
   
                            
     @yield('main')


    
    
  
  <!-- Modal -->
    <div class="modal fade" id="form-dangnhap" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Đăng nhập</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="thongbaoloi"></div>
                <form id="form-post-dangnhap" action="{{route('home.postdangnhap')}}" method="post">
                    @csrf
                      <div class="form-group">
                          <input required type="text"  class="form-control" name="tendangnhap" placeholder="Tên đăng nhập">
                      </div>
                      <div class="form-group">
                          <input required class="form-control"  type="password" name="password" placeholder="Mật khẩu">
                      </div>
                      <div class="login_footer form-group">
                         
                          <a href="{{route('home.quenmatkhau')}}">Quên mật khẩu?</a>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-fill-out btn-block" >Đăng nhập</button>
                      </div>
                  </form>
            </div>
        </div>
        </div>
    </div>
                           
                           
      

    <footer class="footer_dark">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="widget">
                            <div class="footer_logo">
                                <a href="#"><img src="{{url('public/uploads')}}/logo.jpg" alt="logo" /></a>
                            </div>
                           
                        </div>
                        <div class="widget">
                            <ul class="social_icons social_white">
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    {{-- <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="widget">
                            <h6 class="widget_title">Useful Links</h6>
                            <ul class="widget_links">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Location</a></li>
                                <li><a href="#">Affiliates</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div> --}}
                    <div class="col-lg-2 col-md-3 col-sm-6">
                        <div class="widget">
                            <h6 class="widget_title">danh mục</h6>
                            <ul class="widget_links">
                                @foreach ($danhmuc as $item)
                                <li><a href="#">{{$item->tendanhmuc}}</a></li>
                                @endforeach
    
                               
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="widget">
                            <h6 class="widget_title">My Account</h6>
                            <ul class="widget_links">
                                <li><a href="#">My Account</a></li>
                              
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="widget">
                            <h6 class="widget_title">Thông tin liên hệ</h6>
                            <ul class="contact_info contact_info_light">
                                <li>
                                    <i class="ti-location-pin"></i>
                                    <p>Long Xuyên</p>
                                </li>
                                <li>
                                    <i class="ti-email"></i>
                                    <a href="mailto:info@sitename.com">nmhieu_19pm@student.agu.edu.vn</a>
                                </li>
                                <li>
                                    <i class="ti-mobile"></i>
                                    <p>+ 457 789 789 65</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom_footer border-top-tran">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-md-0 text-center text-md-left">© 2020 All Rights Reserved by Bestwebcreator</p>
                    </div>
                    <div class="col-md-6">
                        <ul class="footer_payment text-center text-lg-right">
                            <li><a href="#"><img src="{{url('public/shopwise')}}/assets/images/visa.png" alt="visa"></a></li>
                            <li><a href="#"><img src="{{url('public/shopwise')}}/assets/images/discover.png" alt="discover"></a></li>
                            <li><a href="#"><img src="{{url('public/shopwise')}}/assets/images/master_card.png" alt="master_card"></a></li>
                            <li><a href="#"><img src="{{url('public/shopwise')}}/assets/images/paypal.png" alt="paypal"></a></li>
                            <li><a href="#"><img src="{{url('public/shopwise')}}/assets/images/amarican_express.png" alt="amarican_express"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>
    <script src="{{url('public/shopwise')}}/assets/js/jquery-1.12.4.min.js"></script>
    <script src="{{url('public/shopwise')}}/assets/js/jquery-ui.js"></script>
    <script src="{{url('public/shopwise')}}/assets/js/popper.min.js"></script>
	<script src="{{url('public/shopwise')}}/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{url('public/shopwise')}}/assets/owlcarousel/js/owl.carousel.min.js"></script>
	<script src="{{url('public/shopwise')}}/assets/js/magnific-popup.min.js"></script>
    <script src="{{url('public/shopwise')}}/assets/js/waypoints.min.js"></script>
    <script src="{{url('public/shopwise')}}/assets/js/parallax.js"></script>
    <script src="{{url('public/shopwise')}}/assets/js/jquery.countdown.min.js"></script>
    <script src="{{url('public/shopwise')}}/assets/js/Hoverparallax.min.js"></script>
    <script src="{{url('public/shopwise')}}/assets/js/jquery.countTo.js"></script>
    <script src="{{url('public/shopwise')}}/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="{{url('public/shopwise')}}/assets/js/isotope.min.js"></script>
    <script src="{{url('public/shopwise')}}/assets/js/jquery.appear.js"></script>
    <script src="{{url('public/shopwise')}}/assets/js/jquery.parallax-scroll.js"></script>
    <script src="{{url('public/shopwise')}}/assets/js/jquery.dd.min.js"></script>
    <script src="{{url('public/shopwise')}}/assets/js/slick.min.js"></script>
    <script src="{{url('public/shopwise')}}/assets/js/jquery.elevatezoom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7TypZFTl4Z3gVtikNOdGSfNTpnmq-ahQ&amp;callback=initMap"></script>
    <script src="{{url('public/shopwise')}}/assets/js/scripts.js"></script>
    <script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   

    @yield('js')
    <script>
        $('#form-post-dangnhap').on('submit',function(e){
            e.preventDefault();
            var data=$(this).serialize();
            $.ajax({
                type: "POST",
                url: '{{route('ajax.dangnhap')}}',
                data: data,
                success: function (response) {
                    if(response.error){
                        var _html='';
                       
                            _html+='<div class="alert alert-danger" role="alert">'+response.error+'</div>';
                        
                        $('#thongbaoloi').html(_html);
                    }
                    if(response.data){
                        location.reload();
                    }
                }
            });

           
        })
        $(document).on('click','#btn-get-dathang',function(e){
            e.preventDefault();
            var href=$(this).attr('href');
            $.get("{{route('get.kiemtra_donhang')}}",function(res){
               if(res.error){
                    Swal.fire({
                    icon: 'error',
                    title: 'Không thể đặt hàng',
                    html: res.error,
                    })
               }
               if(res.data){
                    window.location.replace(href);
               }
            });

        });


         $(document).on('click','.btn-themvaogio',function(e){
            e.preventDefault();
           var href=$(this).attr('href');
           $.get(href,function(res){
            Swal.fire(
            res.message,
            'Tiếp tục mua hàng',
            'success'
            )
                load_dropdown();
           })
        
        })
        load_dropdown();
        load_data();
        function load_data(){
            $.get("{{route('giohang.view')}}",function(res){
                $('#table_data').html(res);
            });
        }
        $(document).on('click','.btn-giam',function(e){
            e.preventDefault();
            var href=$(this).attr('href');
            $.get(href,function(res){
                load_data();
                load_dropdown();
            });
        })
        $(document).on('click','.btn-tang',function(e){
            e.preventDefault();
            var href=$(this).attr('href');
            $.get(href,function(res){
                load_data();
                load_dropdown();
            });
        })

       function load_dropdown(){
        $.get("{{route('home.dropdown')}}",function(res){
            $('#dropdown_item').html(res);
        });

        
    }
    </script>
    <script>
        $('#input-search').keyup(function (e) { 
            var _text=$(this).val();
          if(_text!='')
          {
                $.ajax({
                    type: "GET",
                    url: "{{route('ajax-search-sanpham')}}?tukhoa="+_text,
                    success: function (response) {
                        for (var sp of  response) {
                            var _html='';
                            _html+='<li><img src="http://localhost/shopdt1/public/uploads/'+sp.anh+'"><a class="dropdown-item nav-link nav_item" href="http://localhost/shopdt1/chitiet/'+sp.id+'">'+sp.tensp+'</li>';
                        }
                        $('.search-ajax').html(_html);
                    }
                });
          }
          else{
            $('.search-ajax').html('');
          }
        
           
        });
    </script>

   

</body>
</html>

