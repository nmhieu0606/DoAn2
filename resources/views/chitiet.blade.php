@extends('layouts.site')
@section('main')
<div class="ajax_quick_view">
    <div class="row">
        <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
            <div class="product-image">
                <div class="product_img_box">
                    <img src="{{url('public/uploads')}}/{{$data->anh}}">
                </div>
                
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="pr_detail">
                <div class="product_description">
                    <h4 class="product_title"><a href="">{{$data->tensp}}</a></h4>
                    <div class="product_price">
                        <span class="price">{{number_format($data->giaxuat)}}.VND</span>
                        {{-- <del>$55.25</del>
                        <div class="on_sale">
                            <span>35% Off</span>
                        </div> --}}
                    </div>
                    <br>
    
                    <br>
                    <div  class="pr_desc ml-0 ">
                    
                    {!!$data->chitiet!!}
                    </div>
                    <div class="product_sort_info">
                        <ul>
                            <li><i class="linearicons-shield-check"></i>{{$data->baohanh->thoigianbaohanh}}</li>
                            {{-- <li><i class="linearicons-sync"></i> 30 Day Return Policy</li>
                            <li><i class="linearicons-bag-dollar"></i> Cash on Delivery available</li> --}}
                        </ul>
                    </div>
                    
                    
                </div>
                <hr />
                <div class="cart_extra">
                    <div class="cart_btn">
                        <a href="{{route('home.themgiohang',$data->id)}}" class="btn btn-fill-out btn-addtocart" type="button"><i class="icon-basket-loaded"></i>Thêm vào giỏ</a>
                        <a class="add_compare" href="#"><i class="icon-shuffle"></i></a>
                        <a class="add_wishlist" href="#"><i class="icon-heart"></i></a>
                    </div>
                </div>
                <hr />
                <ul class="product-meta">
                    
                    <li>Danh mục: <a href="#">{{$data->danhmuc->tendanhmuc}}</a></li>
                    
                </ul>
                
                <div class="product_share">
                    <span>Share:</span>
                    <ul class="social_icons">
                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                        <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                        <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
        
    </div>
    
</div>
<hr>
<div class="container">
    <h3>Bình luận ở đây</h3>
    @if (Auth::guard('khachhang')->check())
  
    <form>
        
        <div class="mb-3">
            <input hidden value="{{$data->id}}" type="text">
        
          
          <textarea id="comment" type="text" class="form-control " id="exampleInputEmail1" ></textarea>
          <small id="loi-comment" class="help-blog"></small>
        </div>
        
        <button id="btn-comment" type="submit" class="btn btn-primary">Gửi bình luận</button>
    </form>
        
    @else
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Đăng nhập để bình luận
    </button>


    @endif
        
    
    <hr>
    <h3>Các bình luận {{$data->comment->count()}}</h3>
    <hr>
  
    <div id="list-comment" class="comment">
       @include('list_comment',['cm'=>$data->comment])
    </div>


</div>


{{-- modal --}}
<!-- Button trigger modal -->

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Đăng nhập</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div id="thongbaoloi"> 

            </div>
            <form action="" method="POST">
                @csrf
                 <form action="{{route('home.postdangnhap')}}" method="post">
                                  @csrf
                                    <div class="form-group">
                                        <input id="tendangnhap" type="text" required="" class="form-control" name="tendangnhap" placeholder="Tên đăng nhập">
                                    </div>
                                    <div class="form-group">
                                        <input id="password" class="form-control" required="" type="password" name="password" placeholder="Mật khẩu">
                                    </div>
                                    <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                                <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                            </div>
                                        </div>
                                        <a href="{{route('home.quenmatkhau')}}">Quên mật khẩu?</a>
                                    </div>
                                    <div class="form-group">
                                        <button id="btn-login" type="submit" class="btn btn-fill-out btn-block" name="login">Log in</button>
                                    </div>
                                </form>
         
        </div>
        
      </div>
    </div>
  </div>
 
     

@endsection
<script src="assets/js/scripts.js"></script>


@section('js')
	<script>
        let _comment_url='{{route("ajax.comment",$data->id)}}';
        var _csrf='{{csrf_token()}}';
        $('#btn-login').click(function(ev){
            ev.preventDefault();
           
            var login_url='{{route('ajax.dangnhap')}}'
            var tendangnhap=$('#tendangnhap').val();
            var password=$('#password').val();
            $.ajax({
                type: "POST",
                url: login_url,
                data: {
                    tendangnhap:tendangnhap,
                    password:password,
                    _token:_csrf,
                    },
                success: function (response) {
                    if(response.error){
                        let _html_error='<div class="alert alert-danger" role="alert"><button class="close" data-bs-dismiss="alert" aria-hidden="true">&times;</button>';
                        for(let error of response.error){
                            _html_error+=` <li>${error}</li>`;
                            

                        }
                        _html_error+='</div>';
                        $('#thongbaoloi').html(_html_error);

                    }
                    else{
                        alert('Đăng nhập thành công');
                        location.reload();
                    }
                }
            });
            

        });
        
        $('#btn-comment').click(function(ev){
            ev.preventDefault();
            let comment=$('#comment').val();

            $.ajax({
                type: "POST",
                url: _comment_url,
                data: {
                    comment:comment,
                    _token:_csrf
                },
                
                success: function (response) {
                    if(response.error){
                        $('#loi-comment').html(response.error);

                    }
                    else{
                        $('#loi-comment').html('');
                        $('#comment').val('');
                        $('#list-comment').html(response);
                    }
                    
                }
            });


        });

        $(document).on('click','.btn-reply',function(ev){
            ev.preventDefault();
            var id=$(this).data('id');
            var form_reply='.form-reply-'+id;
            var comment_reply_id='#comment-reply-'+id;
            var comment_reply=$(comment_reply_id).val();

            $('.FORM-REPLY').slideUp();
            $(form_reply).slideDown();


        });
        $(document).on('click','.btn-send-comment-reply',function(ev){
            ev.preventDefault();
            var id=$(this).data('id');
            var comment_reply_id='#comment-reply-'+id;
            var comment_reply=$(comment_reply_id).val();
            var form_reply='.form-reply-'+id;  
            $.ajax({
                type: "POST",
                url: _comment_url,
                data: {
                    comment:comment_reply,
                    reply_id:id,
                    _token:_csrf
                },
                success: function (response) {
                    if(response.error){
                        $('#loi-comment').html(response.error);
                    }
                    else{
                        $('#loi-comment').html('');
                        $('#comment').val('');
                        $('#list-comment').html(response);
                    }
                    
                }
            });

            


        });


    </script>
@endsection
