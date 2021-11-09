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
                    
                    <div class="pr_desc">
                    
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

@endsection
<script src="assets/js/scripts.js"></script>
@section('cke')
	<script src="{{ asset('public/js/ckeditor/ckeditor.js') }}"></script>
@endsection
